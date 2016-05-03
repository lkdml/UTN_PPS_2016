function deleteRow(tableID) {
     try {
         
         var table = document.getElementById(tableID);
         var rowCount = table.rows.length;
         for (var i = 1; i < rowCount; i++) {
             var row = table.rows[i];
             var chkbox = row.cells[0].childNodes[0];
             if (null != chkbox && true == chkbox.checked) {
                 table.deleteRow(i);
                 rowCount--;
                 i--;
             }
         }
         
         var checkBoxCheckAll = document.getElementById("checkAll");
         checkBoxCheckAll.checked = false;
         
         
     } catch (e) {
         alert("Error al momento de eliminar la fila");
     }
 }