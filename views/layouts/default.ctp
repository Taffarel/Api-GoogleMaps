<?php echo $this->Html->docType() ?>
<html> 
    <head> 
        <meta name="viewport" content="initial-scale=1.0, user-scalable=no" /> 
        <title>Ideia 1</title> 
        <?php echo $this->Html->charset() ?>

        <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script> 
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script> 

        <script type="text/javascript"> 
            $(document).ready(function(){
                
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(init);
                } else {
                    error('not supported');
                }
                
                function init(center){
                    $.ajax({
                        url: 'restaurantes/init/'+center.coords.latitude+'/'+center.coords.longitude,
                        dataType: 'html',
                        type: 'POST',
                        success: function(data){
                            $("#locais").html(data);
                        }
                    })
                }
                
                init();
                
                $("#address").keyup(function(){
                    var address = $(this).val();
                    var geocoder = new google.maps.Geocoder();
                   
                    geocoder.geocode({
                        address: address
                    }, function(results, status){
                      
                        if(status == google.maps.GeocoderStatus.OK){
                            dados(results[0].geometry.location);
                        }
                    });
                })
                
                $("#RestauranteVisulisarPontosForm").submit(function(e){
                    e.preventDefault();
                    var form = $(this);
                    var url  = form.attr("action");
                    
                    $.ajax({
                        url: url,
                        dataType: 'html',
                        data: form.serialize(),
                        type: 'POST',
                        success: function(data){
                            $("#locais").html(data);
                        }
                    });
                });
                
                function dados(center){
                    $("#RestauranteLnt").val(center.lat());
                    $("#RestauranteLng").val(center.lng());
                }
                              

            });
        </script> 
    </head> 
    <body> 
        <div id="dados">
            <?php echo $this->Form->create('Restaurante', array('action' => 'visulisarPontos')) ?>
            <?php echo $this->Form->input('address', array('id' => 'address', 'label' => 'Digite o endereço que você esta: ')) ?>
            <?php echo $this->Form->input('radius', array('id' => 'radius', 'label' => 'Selecione o raio de distância: ', 'type' => 'select', 'options' => array('5' => '5Km', '10' => '10Km', '25' => '25Km'))) ?>
            <?php echo $this->Form->hidden('lnt') ?>
            <?php echo $this->Form->hidden('lng') ?>
            <?php echo $this->Form->end('Procurar') ?>
        </div>
        <br />
        <br />
        <br />
        <div id="locais"></div>

    </body> 
</html>
