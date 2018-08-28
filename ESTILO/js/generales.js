var idiomaPaginado;
var botonesModal = [];
var ruta_base = window.location.origin+'/murilloFerreteria/src/index.php/';

$(document).ready(function(){
  cleanBotonesModal(false);
});

// -------------------------------------------------------------------------------------------------- destrir tabla
function dropDataTable(tableId){ 
  $('#'+tableId).dataTable().fnDestroy();
  $('#'+tableId).children('tbody').children('tr').remove();
}

// -------------------------------------------------------------------------------------------------- destruir combo
function dropDataCombo(comboId){
  var x = document.getElementById(comboId);
  while (x.length > 0){
      x.remove(x.selectedIndex);
  }
}

// -------------------------------------------------------------------------------------------------- destruir combo
function insertarPaginado(tableId,length,search=false){
  $('#'+tableId).DataTable({
     'paging'       : true,
     'lengthChange' : false,
     'searching'    : search,
     'ordering'     : false,
     'info'         : false,
     'autoWidth'    : false,
     'destroy'      : true,
     "iDisplayLength": length,
     "language"     : {  "url": window.location.origin+"/murilloFerreteria/src/assets/sources/files/SpanishT.json"  }
  });
  $('.dataTables_info').parent().parent().css('padding','0px 30px');
  $('.dataTables_info').parent().css('text-align','right');
  $('.dataTables_info').parent().removeClass('col-sm-5').addClass('row');

}

// -------------------------------------------------------------------------------------------------- crear modal
function modal(tipe,size,titleMod,msg,close){
  switch(tipe){
    case "danger":  tipe = BootstrapDialog.TYPE_DANGER;   break;
    case "info":    tipe = BootstrapDialog.TYPE_INFO;     break;
    case "success": tipe = BootstrapDialog.TYPE_SUCCESS;  break;
    case "primary": tipe = BootstrapDialog.TYPE_PRIMARY;  break;
    case "warning": tipe = BootstrapDialog.TYPE_WARNING;  break;
    default:        tipe = BootstrapDialog.TYPE_DEFAULT;  break;
  }

  switch(size){
    case "large":  size = BootstrapDialog.SIZE_LARGE;   break;
    case "wide":    size = BootstrapDialog.SIZE_WIDE;   break;
  }
  
  BootstrapDialog.show({
    type: tipe,
    title: titleMod,
    size: size,
    message: function(dialogRef){
        var $message = $(msg);
        return $message;
    },
    closable: close,
    buttons: botonesModal
  });
}
//--------------------------------------------------------------------------------------------------- close all modals
function closeAllModals(){
  try {
      BootstrapDialog.closeAll();
  }catch (err) {}
}
// -------------------------------------------------------------------------------------------------- limpia los botones
function cleanBotonesModal(type){
  if(type){
    botonesModal=[{ 
    label: 'Cerrar',
        cssClass: 'btn-default',
        action: function(dialogItself){ dialogItself.close(); }
    }];
  }
  else{
    botonesModal=[];
  }
}

function timeFormat(n) {
    return n < 10 ? '0' + n : n;
}

// -------------------------------------------------------------------------------------------------- peticiones ajax
function getAjax(type,ruta,atrib,from){
  $.ajax({ 
        type: type,   
        url: ruta_base + ruta,   
        data: atrib
    }).done(function(response){
       if(from)
        result(from,response);
      else{
        //startLoader('body');
        window.location.replace(ruta_base+ruta);
      }
    });
}

// -------------------------------------------------------------------------------------------------- validaciones inputs
function validCaracteres(e,id){
    key=e.keyCode || e.which;
    teclado=String.fromCharCode(key).toLowerCase();
    var caracteres;
    especiales = "8-09";

    if($(`#${id}`).attr('limit')){
      if($(`#${id}`).val().length >= parseInt($(`#${id}`).attr('limit')))
        return false;
    }

    if($(`#${id}`).attr('rol')){
      switch($(`#${id}`).attr('rol')){
        //case "phone":
      }
    }

    switch($("#"+id).attr('type')){
        case 'text-number': caracteres = " abcdefghijklmnopqrstuvwxyz1234567890"; break;
        case 'text':        caracteres = " abcdefghijklmnopqrstuvwxyzáéíóúü";     break;
        case 'number': 
          switch($("#"+id).attr('rol')){
            case "negative":
              caracteres = "-1234567890";
              if($("#"+id).val().length >0 && teclado=='-' && $("#"+id).val().indexOf('-')!=-1)
                return false;
              break;
            default:
              caracteres = "1234567890";
          }   
          if($("#"+id).attr('min')){ 
            if(parseInt($('#'+id).val()+teclado)< parseInt($("#"+id).attr('min')))
              return false;
          }
          if($("#"+id).attr('max')){ 
            if(parseInt($('#'+id).val()+teclado)>parseInt($("#"+id).attr('max')))
              return false;   
          }                     
          break;

        case 'prices':      caracteres = "0123456789.";                           break;
        case 'email': caracteres = "abcdefghijklmnopqrstuvwxyz.-_1234567890@";    break;
        default: caracteres = " abcdefghijklmnopqrstuvwxyz.,;:áéíóúü1234567890";  break;
    }
    teclado_especial=false;
    for(var i in especiales){
        if(key==especiales[i]){
            teclado_especial=true;
            break;
        }
    }
    if($("#"+id).attr('type')=="prices"){
      if(caracteres.indexOf(teclado)==-1 && !teclado_especial || $("#"+id).val().indexOf('.')!=-1 && teclado=='.')
        return false;
      if(parseFloat($("#"+id).val())<=0){
        $("#"+id).parent().children('.errorPrice').remove();
        texto   =   '<strong class="errorPrice" style="position: absolute;bottom: -25px; color: red; z-index:1000;">El precio debe ser superior a 0.';
        $("#"+id).parent().append(texto+'</strong>');
      }
      else
        $("#"+id).parent().children('.errorPrice').remove();
    }else{
      if(caracteres.indexOf(teclado)==-1 && !teclado_especial || $("#"+id).val()=="" && key=="32")
        return false;
    } 
}

// -------------------------------------------------------------------------------------------------- Graficas (requieren sus respectivos scripts cargados antes que generales.js)
function Gpastel(NAME,DATA,TITLE,ID){
  $('#'+ID).children('#g').remove();
  $('#'+ID).append('<div id="g'+ID+'" style="min-width: 310px; max-width: 800px; height: 400px; margin: 0 auto; margin-top:30px;"></div>');
  var chart = new Highcharts.chart('g'+ID, {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: TITLE
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.y}</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                }
            }
        },
        series: [{
            name: NAME,
            colorByPoint: true,
            data: DATA
        }]
    });
}

function Gtimeline(YTEXT,DATA,TITLE,ID){
  Highcharts.chart(ID, {
    chart: {type: 'spline'},
    title: {text: TITLE},
    subtitle: {text: ''},
    xAxis: {
        type: 'datetime',
        dateTimeLabelFormats: { // don't display the dummy year
            month: '%e. %b',
            year: '%b'
        },
        title: {
            text: 'Fecha'
        }
    },
    yAxis: {
        title: {
            text: YTEXT
        },
        min: 0
    },
    tooltip: {
        headerFormat: '<b>{series.name}</b><br>',
        pointFormat: '{point.x:%e %b, %Y}: $ {point.y:.2f}'
    },

    plotOptions: {
        spline: {
            marker: {
                enabled: true
            }
        }
    },

    colors: ['#6CF', '#39F', '#06C', '#036', '#000'],

    // Define the data points. All series have a dummy year
    // of 1970/71 in order to be compared on the same x axis. Note
    // that in JavaScript, months start at 0 for January, 1 for February etc.
    series: DATA
});
}

function GlineV(YTEXT,DATA,TITLE,ID){
  Highcharts.chart(ID, {
    chart: {type: 'column' },
    title: {text: TITLE },
    subtitle: {  text: '' },
    xAxis: {
        type: 'category'
    },
    yAxis: {
        title: {
            text: YTEXT
        }

    },
    legend: {
        enabled: false
    },
    plotOptions: {
        series: {
            borderWidth: 0,
            dataLabels: {
                enabled: true,
                format: '{point.y:1f}'
            }
        }
    },

    tooltip: {
        headerFormat: '<span style="font-size:20px">{series.name}</span><br>',
        pointFormat: '<span style="color:{black}">{point.name}</span>: <b>{point.y:1f}</b><br/>'
    },
    series: DATA
});
}