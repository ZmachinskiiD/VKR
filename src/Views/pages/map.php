<?php
/**
 * @var  $buildings
 *
 */
?>

<div id="map" style="width: 100%; height: 90%">

</div>
<!--<script src="/assets/scripts/map.js"></script>-->
<script type="text/javascript">
    let buildings2=<?php echo json_encode($buildings)?>;
    ymaps.ready(init);
    function init()
    {
        var myMap = new ymaps.Map("map",
            {
            center: [54.704, 20.503],
            zoom: 10

            },
        {
            // Зададим ограниченную область прямоугольником,
            // примерно описывающим Санкт-Петербург.
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
            myMap.geoObjects.add(new ymaps.Placemark(building['geolocation'].split(", "), {
                balloonContentHeader: building['rus_name'],
                balloonContentBody: "Содержимое <em>балуна</em> метки",
                balloonContentFooter: "<a href=/detail/?id=10>Пройти на страницу здания</a>",
                hintContent:  building['rus_name'],
            }, {
                preset: 'islands#icon',
                iconColor: '#0095b6',

            }))
        });
        var geolocation = ymaps.geolocation
        geolocation.get({
            provider: 'yandex',
            mapStateAutoApply: true
        }).then(function (result) {
            // Красным цветом пометим положение, вычисленное через ip.
            result.geoObjects.options.set('preset', 'islands#redCircleIcon');
            result.geoObjects.get(0).properties.set({
                balloonContentBody: 'Мое местоположение'
            });
            myMap.geoObjects.add(result.geoObjects);
        });
        console.log("HERE")
    }
</script>
