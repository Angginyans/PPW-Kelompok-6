function rupiah(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
}

var hargalama=$('#harga').val();
var hargabaru=$('#harga');
var hitung=0;

var t = hargalama.replace("Rp", '')
var b = t.replace(".", '')
var c = b.replace(",", '')
var d = c.replace("-", '')

function proses() {
    var kelas=$('#kelas').val();
    if(kelas == 'first class'){
        var chrg = 300000;
        var hsl = parseInt(d)+parseInt(chrg);
        var rpl = "Rp"+rupiah(hsl)+",-";
        hargabaru.val(rpl);
    }else if(kelas == 'bisnis'){
        var chrg = 200000;
        var hsl = parseInt(d)+parseInt(chrg);
        var rpl = "Rp"+rupiah(hsl)+",-";
        hargabaru.val(rpl);
    }
    else if(kelas == 'ekonomi'){
        var chrg = 100000;
        var hsl = parseInt(d)+parseInt(chrg);
        var rpl = "Rp"+rupiah(hsl)+",-";
        hargabaru.val(rpl);
    }else{
        hargabaru.val(d);
    }
}
// $('#kelas').change(function(){
//     // var selek = $('#kelas :selected').text();
//     var selekted = $('#kelas :selected').val();
//     var harga = $('#harga').val();
//

//
//     if (selekted == "first class") {
//         var chrg = 300000;
//         var hsl = parseInt(d)+parseInt(chrg);
//         var rpl = "Rp"+rupiah(hsl)+",-";
//         $('#harga').val(rpl)
//         console.log(rpl)
//     }else if (selekted == "bisnis") {
//         var chrg = 200000;
//         var hsl = parseInt(d)+parseInt(chrg);
//         var rpl = "Rp"+rupiah(hsl)+",-";
//         $('#harga').val(rpl)
//         console.log(rpl)
//     }else {
//         var chrg = 100000;
//         var hsl = parseInt(d)+parseInt(chrg);
//         var rpl = "Rp"+rupiah(hsl)+",-";
//         $('#harga').val(rpl)
//         console.log(rpl)
//     }
//
// });
