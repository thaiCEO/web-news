<script>
  // alert message
const message = (message) => {
  Toastify({
  text: message,
  duration: 3000,
  destination: "https://github.com/apvarun/toastify-js",
  newWindow: true,
  close: true,
  gravity: "top", // `top` or `bottom`
  position: "right", // `left`, `center` or `right`
  stopOnFocus: true, // Prevents dismissing of toast on hover
  style: {
    background: "linear-gradient(to right, #00b09b, #96c93d)",
  },
  onClick: function(){} // Callback after click
}).showToast();
}



   const add_users = (form) => {
     let alldata = new FormData($(form)[0]);

     $.ajax({
      type: "POST",
      url: "http://localhost:8080/web-news/back-end/ajax/users.php?type=saveUser",
      data: alldata,
      dataType: "json",
      contentType: false,
      processData: false,
      success: function (response) {
        if (response.status == 200) {
           $('#modal_add_users').modal('hide');
           $(form).trigger('reset');
           message(response.message);
           selectUser();

        }
      }
     });
   }


   const selectUser = () => {
      $.ajax({
        type: "GET",
        url: "http://localhost:8080/web-news/back-end/ajax/users.php?type=selectUser",
        data: {},
        dataType: "json",
        success: function (response) {
          if(response.status == 200) {
            let allUser = ``;
            let data = response.users;

         
            $.each(data, function(key, value) {
              allUser += `<tr>
                            <td>${value.user_id}</td>
                            <td>${value.username}</td>
                            <td>${value.email}</td>
                            <td>${value.role}</td>
                            <td>
                              <button  data-bs-toggle="modal" data-bs-target="#modal_edite_user" class=" btn btn-info btn-sm rounded-0">edit</button>
                              <button onclick="deleteUser(${value.user_id})"; class=" btn btn-danger btn-sm rounded-0">Delete</button>
                            </td>
                        </tr>`;

                        $("#show_users").html(allUser);
                      });
                  }
             }
      });
   }
   selectUser();


   const deleteUser = (id) => {
        confirm('Are you sure you want to delete');

    $.ajax({
      type: "GET",
      url: "http://localhost:8080/web-news/back-end/ajax/users.php?type=deleteUser",
      data: {
        user_id: id,
      },
      dataType: "json",
      success: function (response) {
        if(response.status == 200) {
          message(response.message);
          selectUser();
        }
      }
    });
   }

 </script>