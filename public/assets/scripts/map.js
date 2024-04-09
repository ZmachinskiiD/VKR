initMap();
async function initMap()
{
    await ymaps3.ready;

    const {YMap, YMapDefaultSchemeLayer} = ymaps3;

    const map = new YMap(
        document.getElementById('map'),
        {
            location: {
                center: [20.503, 54.704],
                zoom: 12
            }
        }
    );
    map.addChild(new YMapDefaultSchemeLayer());
}