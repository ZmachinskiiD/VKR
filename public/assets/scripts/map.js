initMap();
async function initMap()
{
    await ymaps3.ready;

    const {YMap, YMapDefaultSchemeLayer,YMapDefaultFeaturesLayer,YMapTileDataSource,YMapFeature,YMapMarker,YMapDefaultMarker} = ymaps3;

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
    map.addChild(new YMapDefaultFeaturesLayer());

    const defaultMarker = new  YMapDefaultMarker({
        title: 'Привет мир!',
        subtitle: 'Добрый и светлый',
        color: 'blue',
        coordinates: [20.503, 54.704],
    });

    const content = document.createElement('div');
    const marker = new YMapMarker(content);
    content.innerHTML = '<div>Тут может быть все что угодно</div>';

        map.addChild(defaultMarker).addChild(marker);

}
function getRoute(buildings)
{
    point=buildings[0];
    buildings.sort( function (a, b)
    {
        var diffA = (Number(a[1]) - point[1])**2 + (Number(a[0]) - point[0])**2;
        var diffB = (Number(b[1]) - point[1])**2 + (Number(b[0]) - point[0])**2;

        if(diffA > diffB){
            return 1;
        } else if(diffA < diffB){
            return -1;
        } else {
            return 0; // same
        }

    }
    );
}
