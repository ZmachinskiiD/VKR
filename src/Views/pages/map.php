<?php
/**
 * @var  $buildings
 *
 */
?>

<div id="map" style="width: 800px; height: 600px">
</div>
<nav class="level">
    <button class="button is-info" id="deleteFeatured">
        Показать/Убрать избранные здания
    </button>
    <button class="button is-info" id="deleteUsual">
        Показать/Убрать неизбранные здания
    </button>
</nav>
<script type="text/javascript">
    deleteFeatured=document.getElementById("deleteFeatured");
    deleteUsual=document.getElementById("deleteUsual");
    let buildings2=<?php echo json_encode($buildings)?>;
    ymaps.ready(init);
    function init()
    {
        console.log("THERE")
        var myMap = new ymaps.Map("map",
            {
            center: [54.704, 20.503],
            zoom: 10

            },
        {
            restrictMapArea: [
                [54.752266, 20.443471],
                [54.688278, 20.549792]
            ]
        },
            {
                searchControlProvider: 'yandex#search'
            }

        );
        let buildings=<?php echo json_encode($buildings)?>;
        buildings.forEach((building)=>
        {
            var iconColor
            if(building['isFeatured'])
            {
                iconColor='red'
            }
            else
            {
                iconColor='blue'
            }
            myMap.geoObjects.add(new ymaps.Placemark(building['geolocation'].split(", "), {
                balloonContentHeader: building['rus_name'],
                balloonContentBody: "Содержимое <em>балуна</em> метки",
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
                // Зададим иконку для кнопки.
                image: 'images/button.jpg',
                // Текст на кнопке.
                content: 'Cкрыть балуны',
                // Текст всплывающей подсказки.
                title: 'Click to save the route'
            },
            options: {
                // Зададим опции кнопки.
                selectOnClick: false,
                // У кнопки будет три состояния: иконка, текст и текст + иконка.
                // Зададим три значения ширины кнопки для всех состояний.
                maxWidth: [30, 100, 200]
            }
        });
        button.events.add("click",function (e)
        {console.log(myMap.geoObjects[0])})
        myMap.controls.add(button, { float: 'right', floatIndex: 100 });
    }
</script>
