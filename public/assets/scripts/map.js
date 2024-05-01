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