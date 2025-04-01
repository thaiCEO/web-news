<script>

const add_Category = (form) => {
  let alldata = new FormData($(form)[0]);

  $.ajax({
    type: "POST",
    url: "http://localhost:8080/web-news/back-end/ajax/category.php?type=saveCategory",
    data: alldata,
    dataType: "json",
    contentType: false,
    processData: false,
    success: function (response) {
      if(response.status == 200) {
        message(response.message);
        selectCategory();
      }
    }
  });

}

const selectCategory = () => {
  $.ajax({
    type: "GET",
    url: "http://localhost:8080/web-news/back-end/ajax/category.php?type=selectCategory",
    data: {},
    dataType: "json",
    success: function (response) {
      if(response.status == 200) {
        let allCategory = ``;
        let data = response.category;

        $.each(data, function (index, value) { 
           allCategory += `

               <tr>
                   <td>${value.category_id}</td>
                   <td>${value.category_name}</td>
                   <td>${value.status}</td>
                   <td class=" text-center">
                        <button onclick="editCategory(${value.category_id})"; data-bs-toggle="modal" data-bs-target="#modal_edite_user" class=" btn btn-info btn-sm rounded-0 edit_category">edit</button>
                        <button onclick="deleteCatetory(${value.category_id})"; class=" btn btn-danger btn-sm rounded-0">Delete</button>
                   </td>
               </tr>
           
           `;

          $("#allCategory").html(allCategory);
        });
      }
    }
  });
}

selectCategory();


$(document).on('click', '.edit_category' , function  () {
  $('.save_category').text('update');
  $('.save_category').attr('onclick', 'update_category("#formCategory")')

})

$(document).on('click', '.reset_category' , function  () {
  $('.save_category').text('save');
  $('.save_category').attr('onclick', 'add_Category("#formCategory")')

})


const editCategory = (id) => {
   
  $.ajax({
    type: "POST",
    url: "http://localhost:8080/web-news/back-end/ajax/category.php?type=editcategory",
    data: {
      category_id : id
    },
    dataType: "json",
    success: function (response) {
      if(response.status == 200) {
       let data = response.category;
        $("#category_id").val(data.category_id);
        $("#category_name").val(data.category_name);
        $("#category_status").val(data.status);
      }
    }
  });
}


const update_category = (form) => {
  let alldata = new FormData($(form)[0]);

    $.ajax({
      type: "POST",
      url: "http://localhost:8080/web-news/back-end/ajax/category.php?type=updateCategory",
      data: alldata,
      dataType: "json",
      contentType: false,
      processData: false,
      success: function (response) {
        if(response.status == 200) {
          message(response.message);
          $(form).trigger('reset');
          selectCategory();
          $('.save_category').text('save');
          $('.save_category').attr('onclick', 'add_Category("#formCategory")')
        }
      }
    });
}



const deleteCatetory = (id) => {
   confirm("Are you sure you want to delete");
   $.ajax({
     type: "POST",
     url: "http://localhost:8080/web-news/back-end/ajax/category.php?type=deleteCategory",
     data: {
       category_id : id
     },
     dataType: "json",
     success: function (response) {
       if(response.status == 200) {
         message(response.message);
         selectCategory();
       }
     }
   });
 
}
</script>