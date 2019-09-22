var page = 1;
var current_page = 1;
var total_page = 0;
var is_ajax_fire = 0;


// manageRow();
//manageData();

/* manage data list */
// function manageData() {
//     $.ajax({
//         dataType: 'json',
//         url: url,
//         data: {page:page}
//     }).done(function(data) {
//         total_page = data.last_page;
//         current_page = data.current_page;
//         $('#pagination').twbsPagination({
//             totalPages: total_page,
//             visiblePages: current_page,
//             onPageClick: function (event, pageL) {
//                 page = pageL;
//                 if(is_ajax_fire != 0){
//                   getPageData();
//                 }
//             }
//         });
//         manageRow(data.data);
//         is_ajax_fire = 1;
//     });
// }

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

/* Get Page Data*/
// function getPageData() {
//     $.ajax({
//         dataType: 'json',
//         url: url,
//         data: {page:page}
//     }).done(function(data) {
//         manageRow(data.data);
//     });
// }

/* Add new Post table row */
// function manageRow(data) {
//     var rows = '';
//     $.each( data, function( key, value ) {
//         rows = rows + '<tr>';
//         rows = rows + '<td>'+value.title+'</td>';
//         rows = rows + '<td>'+value.details+'</td>';
//         rows = rows + '<td data-id="'+value.id+'">';
//         rows = rows + '<button data-toggle="modal" data-target="#edit-item" class="btn btn-primary edit-item">Edit</button> ';
//         rows = rows + '<button class="btn btn-danger remove-item">Delete</button>';
//         rows = rows + '</td>';
//         rows = rows + '</tr>';
//     });
//     $("tbody").html(rows);
// }

/* Create new Post */
$(".crud-submit").click(function(e) {
    e.preventDefault();
    var form_action = $("#create-item").find("form").attr("action");
        var id = $("#create-item").find("input[name='id']").val();
    var title = $("#create-item").find("input[name='title']").val();
    var details = $("#create-item").find("input[name='childname']").val();
    $.ajax({
        dataType: 'json',
        type:'POST',
        url: form_action,
        data:{title:title,id:id, details:details}
    }).done(function(data){
      /*   getPageData();*/
        $(".modal").modal('hide');
 var len = 0;
           $('#example2 tbody').empty(); // Empty <tbody>
           if(data['data']  != null){
             len =data['data'].length;
           }

           if(len > 0){
             for(var i=0; i<len; i++){
               var id = data['data'][i].id;
                var tag= data['data'][i].tag_id;
               var username = data['data'][i].child_id;
               var name = data['data'][i].parent_id;
               var email = data['data'][i].token_id;

               var tr_str = "<tr>" +
                   "<td align='center'>" + (i+1) + "</td>" +
                      "<td align='center'>" +tag + "</td>" +
                   "<td align='center'>" + username + "</td>" +
                   "<td align='center'>" + name + "</td>" +
                   "<td align='center'>" + email + "</td>" +
               "</tr>";

               $("#example2 tbody").append(tr_str);
             }
           }else if(data['data'] != null){
              var tr_str = "<tr>" +
                  "<td align='center'>1</td>" +
                    "<td align='center'>" + data['data'].tag_id+ "</td>" + 
                  "<td align='center'>" + data['data'].child_id+ "</td>" + 
                  "<td align='center'>" + data['data'].parent_id+ "</td>" +
                  "<td align='center'>" + data['data'].token_id + "</td>" +
              "</tr>";

              $("#example2 tbody").append(tr_str);
           }else{
              var tr_str = "<tr>" +
                  "<td align='center' colspan='4'>No record found.</td>" +
              "</tr>";

              $("#example2 tbody").append(tr_str);
           }
        // var $table  = $('<table></table>');
        //      $('#destination').html('');

        //     for(var i=0;i<=data.length;i++) {
        //         //  alert(data[i].child_id);
        //          $table.append('<tr><td>No</td><td>'+data[i].child_id+'</td></tr>');
        //          $table.append('<tr><td>Token </td><td>'+data[i].token_id+'</td></tr>');
        //      }
        //      $('#destination').append($table);
        toastr.success('Post Created Successfully.', 'Success Alert', {timeOut: 5000});
    });
});

/* Remove Post */
$("body").on("click",".remove-item",function() {
    var id = $(this).parent("td").data('id');
    var c_obj = $(this).parents("tr");
    $.ajax({
        dataType: 'json',
        type:'delete',
        url: url + '/' + id,
    }).done(function(data) {
        c_obj.remove();
        toastr.success('Post Deleted Successfully.', 'Success Alert', {timeOut: 5000});
        getPageData();
    });
});

/* Edit Post */
$("body").on("click",".edit-item",function() {
    var id = $(this).parent("td").data('id');
     var token = $(this).parent("td").prev("td").prev("td").text();
    var title = $(this).parent("td").prev("td").prev("td").text();
    var details = $(this).parent("td").prev("td").text();
       $("#edit-item").find("input[name='token']").val(id);
    $("#edit-item").find("input[name='title']").val(title);
    $("#edit-item").find("textarea[name='details']").val(details);
    $("#edit-item").find("form").attr("action",url + '/' + id);
});

/* Updated new Post */
$(".crud-submit-edit").click(function(e) {
    e.preventDefault();
    var form_action = $("#edit-item").find("form").attr("action");
    var title = $("#edit-item").find("input[name='title']").val();
    var details = $("#edit-item").find("textarea[name='details']").val();
    $.ajax({
        dataType: 'json',
        type:'PUT',
        url: form_action,
        data:{title:title, details:details}
    }).done(function(data){
        getPageData();
        $(".modal").modal('hide');
        toastr.success('Post Updated Successfully.', 'Success Alert', {timeOut: 5000});
    });
}); 

 
      $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
           //Initialize Select2 Elements
        $(".select2").select2();
         //Add text editor
        $("#compose-textarea").wysihtml5();

        //Datemask dd/mm/yyyy
               $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});



      });

   
