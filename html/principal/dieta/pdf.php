<?php
    include "../../../php/principal/sessao.php";
    include "../../../php/principal/dieta/info-pdf.php";
?>

<!DOCTYPE html>

<html lang="pt-br">
    <head>
        <link href="../../../css/pdf.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.4.1/jspdf.min.js"></script> 
        <script src="https://cdn.jsdelivr.net/npm/canvas2image@1.0.5/canvas2image.min.js"></script>
    </head>

    <script language="javascript">
        (function($){
            $.fn.createPdf = function(parametros) {
                
                var config = {              
                    'fileName':'html-to-pdf'
                };
                
                if (parametros){
                    $.extend(config, parametros);
                }                            

                var quotes = document.getElementById($(this).attr('id'));

                html2canvas(quotes, {
                    onrendered: function(canvas) {
                        var pdf = new jsPDF('p', 'pt', 'letter');

                        for (var i = 0; i <= quotes.clientHeight/980; i++) {
                            var srcImg  = canvas;
                            var sX      = 0;
                            var sY      = 980*i;
                            var sWidth  = 900;
                            var sHeight = 980;
                            var dX      = 0;
                            var dY      = 0;
                            var dWidth  = 900;
                            var dHeight = 980;

                            window.onePageCanvas = document.createElement("canvas");
                            onePageCanvas.setAttribute('width', 900);
                            onePageCanvas.setAttribute('height', 980);
                            var ctx = onePageCanvas.getContext('2d');
                            ctx.drawImage(srcImg,sX,sY,sWidth,sHeight,dX,dY,dWidth,dHeight);

                            var canvasDataURL = onePageCanvas.toDataURL("image/png", 1.0);
                            var width         = onePageCanvas.width;
                            var height        = onePageCanvas.clientHeight;

                            if (i > 0) {
                                pdf.addPage(612, 791);
                            }

                            pdf.setPage(i+1);
                            pdf.addImage(canvasDataURL, 'PNG', 20, 40, (width*.62), (height*.62));
                        }

                        pdf.save(config.fileName);
                    }
                });
            };
        })(jQuery);


        function createPDF() {
            $('#renderPDF').createPdf({
                'fileName' : 'Dieta - Natureba'
            });
        }
    </script>
    <body onload="createPDF(); linkC()">
        <div id="renderPDF" class="container">
            <div class="pdf">
                <div>
                    <div style="margin-left: auto; margin-right: auto; width: fit-content;">
                        <img src="../../../img/site/nome.png">
                    </div>
                    <div style="margin-top: 32px;">
                        <div  style="display: flex; justify-content: space-between;">   
                            <div>
                                <h1><b>Cliente: </b><?php echo $NomeCliente;?></h1>
                            </div>
                            <div>
                                <h1><b>Nutricionista: </b><?php echo $NomeNutri;?></h1>
                            </div>
                        </div>
                        <div>
                            <h1><b>Data: </b><?php echo $data;?></h1>
                        </div>
                    </div>
                </div>
                <div style="margin-top: 32px;">
                    <textarea readonly><?php echo $texto;?></textarea>
                </div>
            </div>
        </div>
    </body>

    <script>
        setTimeout( function linkC(){
            window.location.replace("cliente.php");
        }, 300);
    </script>
</html>