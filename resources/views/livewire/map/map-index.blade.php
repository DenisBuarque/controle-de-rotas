<div>
    <div class="grid grid-cols-7 gap-1 bg-black h-screen">

        <div id="map" class="col-span-7 md:col-span-5 bg-white h-96 md:h-full"></div>

        <!-- list routes -->
        <div class="col-span-7 md:col-span-2 bg-white p-2 overflow-y-auto">

            <table>
                <tbody>
                    @forelse ($destinies as $value)

                        @php
                            $checked = null;
                            if($value->checked == 'Finish'){
                                $checked = 'checked';
                            }
                        @endphp

                        <tr valign="top">
                            <td class='px-2 py-1'>
                                <input wire:click='updateChecked({{ $value->id }})' value='{{ $value->id }}' type="checkbox" {{ $checked }} name="checked">
                            </td>
                            <td class='px-2 py-1'>
                                <div class='text-base'>{{ $value->client->name }}</div>
                                <div class='text-xs text-red-500'>{{ $value->service->name }}</div>
                                <div class='text-sm text-gray-400'>{{ $value->client->address.', nº '.$value->client->number.', '.$value->client->address_complement.', '.$value->client->district }}</div>

                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="2" class='px-2 py-1'>
                                Nenhum registro cadastrado.
                            </td>
                        </tr>
                    @endforelse
                    
                </tbody>
            </table>

            <p class='mt-8'>Acompanha seu(s) trajetos:</p>
            <div id="trajeto-texto" class="text-xs"></div>

        </div>
        <!-- end list routes -->

    </div>

    <script>
        //script para captura de geolocalização do visitante da página web.
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
        } else {
            alert("O seu navegador não suporta Geolocalização.");
        }
    
        // função de retorno caso o navegador suporte Geolocalização.
        function showPosition(position) {
            // guarda os valores capturados em variáveis.
            latitude = position.coords.latitude;
            longitude = position.coords.longitude;
            map = 0;
            google.maps.event.addDomListener(window, 'load', initMap());
        }
        
        var map;
    
        function initMap() {
    
            var directionsRenderer = new google.maps.DirectionsRenderer;
            var directionsService = new google.maps.DirectionsService;
    
            map = new google.maps.Map(document.getElementById('map'), {
                disableDefaultUI: true,
                zoom: 13,
                zoomControl: true,
                scaleControl: true,
                durationInTraffic: true,
                streetViewControl: true,
                suppressMarkers: true,
                avoidHighways: true,
    
                center: {
                    lat: latitude,
                    lng: longitude
                }
            });
    
            directionsRenderer.setMap(map);
            directionsRenderer.setPanel(document.getElementById("trajeto-texto"));
            calculateAndDisplayRoute(directionsService, directionsRenderer);
    
            //var trafficLayer = new google.maps.TrafficLayer();
            //trafficLayer.setMap(map);
    
        } //end initMap
    
        function calculateAndDisplayRoute(directionsService, directionsRenderer) {
    
            directionsService.route({
                origin: { lat: latitude, lng: longitude },
                destination: "Av. Clodoaldo da Fonseca, 211 - Farol, Maceió - AL, 57051-150",
                waypoints: [ 
                    @php 
                        foreach ($destinies as $value){
                            echo '{location: "'.$value->client->address.','.$value->client->number.','.$value->client->district.','.$value->client->city.','.$value->client->state.','.$value->client->postal_code.', Brasil"},';
                        }
                    @endphp 
                ],
                optimizeWaypoints: true,
                travelMode: google.maps.DirectionsTravelMode.DRIVING,
                unitSystem: google.maps.UnitSystem.METRIC,
    
            }, function(response, status) {
    
                if (status == google.maps.DirectionsStatus.OK) {
    
                    directionsRenderer.setOptions({
                        preserveViewport: true,
                    });
                    directionsRenderer.setDirections(response);
    
                } else {
                    window.alert('A solicitação de rota falhou devido a ' + status);
                }
            });
        }
    
    </script>
    
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBdXiBglYwjsmbyE643OILAjwvg54LqBUk&callback=initMap&libraries=&v=weekly"
        async></script>
</div>
