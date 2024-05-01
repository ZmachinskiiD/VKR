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
        var myMap = new ymaps.Map("map", {
            center: [54.704, 20.503],
            zoom: 10
        });
        let buildings=<?php echo json_encode($buildings)?>;
        buildings.forEach((building)=>
        {
            alert(building['geolocation']);
            myMap.geoObjects.add(new ymaps.Placemark(building['geolocation'].split(", "), {
                balloonContent: building['rus_name']
            }, {
                preset: 'islands#icon',
                iconColor: '#0095b6',

            }))
        })
    }
</script>
