$(document).ready(function(){
    $("#logout").click(function(){
        swal.fire({
            title:"Konfirmasi",
            text:'apakah kamu ingin keluar dari aplikasi ini ?',
            showCancelButton: true,
            confirmButtonText: 'Iya',
            cancelButtonText: 'Tidak',
            cancelButtonColor:'#fd397a',
            type:'question'
        }).then(function(result){
            if(result.value){
                window.location.href=base_url+'auth/sign_out';
            }
        })
    });

})
var loading= new KTDialog();
/**
 * fungsi data table server side core
 */
function getDataTable(set_url = null,set_idtabel=null){
    this.checked   = [];
    let idtabel    = set_idtabel==null ? $("__datatable"):$("#"+set_idtabel);
    let trID       ='';
    let img        ="";
    let CekWarnaTd = idtabel.attr('data-warna_td');
    let CekDataUrl = (set_url==null ? idtabel.attr('data-url') : set_url);
    let get_url    = base_url+CekDataUrl;
    let loading_text=idtabel.attr('data-loading_text')==null?' Loading data':idtabel.attr('data-loading_text');
    $.fn.dataTableExt.oApi.fnPagingInfo = function (oSettings)
    {
        return {
            "iStart": oSettings._iDisplayStart,
            "iEnd": oSettings.fnDisplayEnd(),
            "iLength": oSettings._iDisplayLength,
            "iTotal": oSettings.fnRecordsTotal(),
            "iFilteredTotal": oSettings.fnRecordsDisplay(),
            "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
            "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
        };
    };
    getWarnaTd = function(row){
        $warna = $(row).find('#warna_info').val();
        $(row).addClass($warna);
    }
    let NumberAuto = idtabel.attr('data-number_auto');
    let table = idtabel.DataTable({
        "bProcessing": true,
        "serverSide": true,
        "bFilter": true,
        "select": "multi",
        "lengthMenu": [[10, 50, 100, 300,400,500,700,900,1000,2000,4000,8000,10000,20000,30000,100000], [10, 50, 100, 300,400,500,700,900,1000,2000,4000,8000,10000,20000,30000,100000]],
        buttons: [
            // { extend: 'pdf', className: 'btn default' },
            // { extend: 'excel', className: 'btn default' },
        ],
        "dom": "<'row kt-datatable' <'col-md-12'B>><'row' <'col-md-12'<'label_search'>>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>",
        "ajax":{
            url : get_url, 
            type: "post",
            data:FilterData,
            error: function(){
              $("#employee_grid_processing").css("display","none");
            }
        },
        "language"  : {
            "processing": loading_text+img,
            "info"      : "Show _START_ - _END_ Record, From _TOTAL_ Record count",
            "infoEmpty" : "Empty Data",
            "emptyTable": "Empty Data",
            "lengthMenu": "_MENU_ Data Per Page",
            "search"    : "Searching:"
        },
        "rowCallback": function( row, data ) {
           trID =(data[0].replace('/','')).split('<center>');
           $(row).addClass(trID[1]);
        },
        "rowCallback": function (row, data, iDisplayIndex) {
            let info    = this.fnPagingInfo();
            let page    = info.iPage;
            let length  = info.iLength;
            let index   = page * length + (iDisplayIndex + 1);
            if(CekWarnaTd == 1 || CekWarnaTd != undefined){
                getWarnaTd.call(this,row);
            }
            if(NumberAuto == 1 || NumberAuto == undefined){
                $('td:eq(0)', row).html(index+'.');
                $('td:eq(0)',row).attr('align', 'center');
            }
            if(idtabel.attr('data-getRowColor') != undefined){
                $(row).addClass('text_'+$('td:eq(5)',row).find('center')["0"].childNodes[1].dataset.status);
            }
        },
    });
    $("div.label_search").html(''); 
    return table;   
}
/**end */

function getFilterData(table,btn=null){
    if(btn!=null){
        var tombol=btn;
    }else{
        var tombol="#button-search";
    }
    $(document).on('click',tombol,function(e) {
        e.preventDefault();
        table.draw(); 
    });
    
}

/**end fungsi getdatatable */
function FilterData(filter){
    let $cekField = $("#form-search").find(".filter");
    if($cekField.length > 0){
        var field = {};
        $( ".filter" ).each(function( index ,element) {
          var getNameField = $(this)["0"].name;
          if($(this)["0"].value != ''){
            field[getNameField] = $(this)["0"].value;
          }
        });
        filter.getSearch = field;
    }
    
}

/**end fungsi getdatatable */
function FilterData(filter){
    $cekField = $("#form-search").find(".filter");
    if($cekField.length > 0){
        var field = {};
        $( ".filter" ).each(function( index ,element) {
          var getNameField = $(this)["0"].name;
          if($(this)["0"].value != ''){
            field[getNameField] = $(this)["0"].value;
          }
        });
        filter.getSearch = field;
    }
    
}

/**fungsi filter data */
function getFilterData(table,btn=null){
    if(btn!=null){
        var tombol=btn;
    }else{
        var tombol="#button-search";
    }
    $(document).on('click',tombol,function(e) {
        e.preventDefault();
        table.draw(); 
    });
}
function getItemsCombobox(id,map_to,opt_text)
{
    $(document).on('change',id,function(){
        let DataUrl         =   $(this).attr('data-url');
        let value           =   $(this).val();
        let msg_loading     =   $(this).attr('data-msg-loading');
        let url             =   base_url+DataUrl;
        let loading= new KTDialog();
        loading.show();
        $.ajax({
            type:'POST',
            url:url,
            dataType:'json',
            data:{'id':value},
            beforeSend:function()
            {
            },
            error:function(xhr, err, desc)
            {
                loading.hide();
            },
            success:function(json)
            {
                loading.hide();
                if(json.notif!='' && typeof json.notif != 'undefined'){
                    //
                }else{
                    $(map_to).empty().append('<option value="">'+opt_text+'</option>');
                    $.each(json,function(i, obj){
                        var keys = Object.keys( obj );
                        var id=keys[0];
                        var text=keys[1];
                        $(map_to).append('<option value="'+obj[id]+'">'+obj[text]+'</option>');
                    })
                }                
            }
        })
    })
}

function format_mata_uang(el=null,pref=null){
    $(document).on('keyup',el,function(){
        var $this=$(this);
        var bilangan=$this.val();
        var     number_string = bilangan.replace(/[^,\d]/g, '').toString(),
                split   = number_string.split(','),
                sisa    = split[0].length % 3,
                rupiah  = split[0].substr(0, sisa),
                ribuan  = split[0].substr(sisa).match(/\d{1,3}/gi);
                
            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }
            
            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            $this.val(pref == undefined ? rupiah : (rupiah ? rupiah : ''))
    })
}

function notifikasi(msg=null,tipe=null,times=null,$title=null,$icon=null){
    let time=1000;
    if(times!=null){
        time=times;
    }
    $.notify({ 
        icon: $icon, 
        message:msg,
        title:$title,
        icon_type:'class',
        },{
        type: tipe,
        spacing: 10,                  
        timer: time,
        placement: {
            from: 'top', 
            align: 'right'
        },
        offset: {
            x: 30, 
            y: 30
        },
        delay: 100,
        z_index: 10000,
        animate: {
            enter: 'animated fadein',
            exit: 'animated fadein'
        }
    });
}