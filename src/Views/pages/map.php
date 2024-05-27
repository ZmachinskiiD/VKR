<?php
/**
 * @var  $buildings
 *
 */
?>

<div id="map" style="width: 1000px; height: 600px">
</div>

<script type="text/javascript">
    ymaps.ready(init);
    function init()
    {
        routeBuildings=[];
        buttonstatus=0;
        var myMap = new ymaps.Map
        ("map",
            {
            center: [54.704, 20.503],
            zoom: 10
            },
        {
            restrictMapArea: [[54.752266, 20.443471], [54.688278, 20.549792]]
        },
            {searchControlProvider: 'yandex#search'}

        );
        let buildings=<?php echo json_encode($buildings)?>;
        buildings.forEach((building)=>
        {
            var iconColor
            if(building['isFeatured'])
            {
                iconColor='red'
                routeBuildings.push(building['geolocation'].split(", "))
            }
            else
            {iconColor='blue'}
            myMap.geoObjects.add(new ymaps.Placemark(building['geolocation'].split(", "), {
                balloonContentHeader: building['rus_name'],
                balloonContentFooter: "<a href=/detail/?id=10>Пройти на страницу здания</a>",
                hintContent:  building['rus_name'],
                iconColor: '#3b5998'
            }, {
                preset: 'islands#icon',

                    iconColor: iconColor
            }))
        });
        var button = new ymaps.control.Button
        (
            {
            data: {
                content: 'Маршрут',
                title: 'Click to save the route'
            },
            options: {
                selectOnClick: false,
                maxWidth: [30, 100, 200]
            }
        });
        button.events.add("click",function (e)
        {
            if(buttonstatus===0)
            {
                routeBuildings = getRoute(routeBuildings);
                if (routeBuildings.length > 1) {
                    multiRoute = new ymaps.multiRouter.MultiRoute({
                        referencePoints: routeBuildings,
                        params: {
                            routingMode: 'pedestrian'
                        }
                    }, {
                        boundsAutoApply: true
                    });
                    myMap.geoObjects.add(multiRoute);
                }
                buttonstatus=1;
            }
            else if(buttonstatus===1)
            {
                myMap.geoObjects.remove(multiRoute)
                buttonstatus=0;
            }
        }
        )
        myMap.controls.add(button, { float: 'right', floatIndex: 100 }
        );
    }
    function getRoute(buildings)
    {
        sortedBuildings=[];
        while(buildings.length>0)
        {
            point = buildings[0];
            sortedBuildings.push(point)
            buildings=buildings.slice(1);
            buildings=buildings.sort
            (function (a, b)
                {
                    var diffA = ((a[1]) - point[1]) ** 2 + ((a[0]) - point[0]) ** 2;
                    var diffB = ((b[1]) - point[1]) ** 2 + ((b[0]) - point[0]) ** 2;

                    if (diffA > diffB) {
                        return 1;
                    } else if (diffA < diffB) {
                        return -1;
                    } else {
                        return 0; // same
                    }

                }
            );
        }
        return(sortedBuildings)
    }
</script>
