$(document).ready(function(){

    function loadExcel(f,callback){
        let file = f[0].target.files[0]
    
        let reader = new FileReader()

        reader.onload = function (e) {
            var data = e.target.result;
            var workbook = XLSX.read(data, {
                type: 'binary'
            });

            let values = []
            workbook.SheetNames.forEach(function (sheetName) {
                var XL_row_object = XLSX.utils.sheet_to_row_object_array(workbook.Sheets[sheetName]);
                var json_object = JSON.parse(JSON.stringify(XL_row_object))
               values = json_object
            })
            callback(values)
            values = []
        };

        reader.readAsBinaryString(file)
    }

    $('#file').change(function(e){
        loadExcel($(e),function(record){
          console.log(record)
        });
    });
});