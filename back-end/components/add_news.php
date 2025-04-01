<script>
    
    let router = "http://localhost:8080/web-news/back-end/ajax/add_news.php?type=";


    $(document).on('input' , '#searchContent' , function () {
        let search = $(this).val().trim();
        selectNews(search);

    })
    

    const upload_image = (form) => {
        let allData = new FormData($(form)[0]);
        $.ajax({
            type: "POST",
            url: router + "uploadImage",
            data: allData,
            dataType: "json",
            contentType: false,
            processData: false,
            success: function (response) {

                if(response.status == 200) {
                   
                    var img = `
                        <input type="hidden" name="image_name" value="${response.image_name}" />
                        <img style="width: 100%; height: 100%;" src="./folder_upload_image/tmp/${response.image_name}" alt="img">
                        <button onclick="cancelImage('${response.image_name}')" class="btn btn-danger btn-cancel">Cancel</button>
                    `;
 
                    $(".image_preview").html(img);
                }
            }
        })
         
    }



    const cancelImage = (image) => {
        if(confirm("Are you sure to cancel this image?")) {
            $.ajax({
                type: "POST",
                url: router + "cancel",
                data: {
                    image_name: image
                },
                dataType: "json",
                success: function (response) {
                    if(response.status == 200) {
                        $(".image_preview").html("");
                    }
                }
            });
        }
        }


        const add_news = (form) => {
            let allData = $(form).serializeArray();
            $.ajax({
                type: "POST",
                url: router + "addNews",
                data: allData,
                dataType: "json",
                success: function (response) {
                    if(response.status == 200) {
                        $("#modal_add_news").modal("hide");
                        $(form).trigger("reset");
                        selectNews();
                        message(response.message);
                    }
                }
            });

        }
    

    const selectNews = (search , page=1) => {
        $.ajax({
            type: "GET",
            url: router + "selectNews",
            data: {
                search_item: search,
                page: page
            },
            dataType: "json",
            success: function (response) {
                if(response.status == 200) {
                    let allNews = ``;
                    let data = response.News;
                    

                    $.each(data, function (key, value) {
                        allNews += `
                         <tr class="align-middle text-center">
                                <td>${value.id}</td>
                                <td><img style="width: 150px; height: 100px;" src="./folder_upload_image/upload_new/${value.image}" alt=""></td>
                                <td>${value.title}</td>
                                <td>${value.category_name}</td>
                                <td>${value.date}</td>
                                <td>${(value.author != '') ? value.author : 'empty'}</td>
                                <td>${(value.status == 1 ? "Active" : "Block")}</td>
                                <td class="text-center justify-content-center d-flex algin-items-center mt-4">
                                    <!-- Edit Button -->
                                    <button onclick="editNews('${value.id}')" data-bs-toggle="modal" data-bs-target="#modal_edit_news" 
                                            class="btn btn-info btn-sm rounded-3 shadow-none d-flex align-items-center px-2 py-2 ml-2">
                                        <i class="bi bi-pencil-fill me-1"></i> Edit
                                    </button>

                                    <!-- Delete Button -->
                                    <button onclick="showDeleteNews('${value.id}', '${value.image}')" data-bs-toggle="modal" data-bs-target="#modal_delete_news" 
                                            class="btn btn-danger btn-sm rounded-3 ms-2 shadow-none d-flex align-items-center px-2 py-2">
                                        <i class="bi bi-trash-fill me-1"></i> Delete
                                    </button>
                                </td>

                            </tr>
                        `;

                        pagination = `
                            <nav aria-label="...">
                                <ul class="pagination">
                                    <li onclick="previousPage(${page})"  class="page-item ${page == 1 ? 'disabled' : ''}">
                                    <a class="page-link">Previous</a>
                                    </li> `;

                                   for(let i = 1; i<=response.total_pages; i++) {
                                       pagination += `
                                       <li class="page-item" aria-current="page">
                                       <a onclick="changePage(${i})" class="page-link ${i == response.crrentPage ? 'bg-info' : ''}" >${i}</a>
                                       </li> 
                                       `
                                   }
                                    
                                pagination +=` <li class="page-item">
                                    <a onclick="nextPage(${page})" class="page-link" ${page == response.total_pages ? 'd-none' : ''}>Next</a>
                                    </li>
                                </ul>
                            </nav>
                        `;



                        $(".show_news").html(allNews);
                        $(".showing_pagination").html(pagination);
                    })

                }
            }
        });
    }

    selectNews('');

    const changePage = (page) => {
        selectNews('', page);
    }

    const nextPage = (page) => {
        selectNews('', page + 1);
    }
    const previousPage = (page) => {
        selectNews('', page - 1);
    }

    const btnReset = () => {
        selectNews('');
        $("#searchContent").val('');
    }




    
    const showDeleteNews = (id , image) => {
        $(".content_id").val(id)
        $(".content_image").val(image);
    }

    const deleteNews = () => {
        let id = $(".content_id").val();
        let image = $(".content_image").val();
        $.ajax({
            type: "POST",
            url: router + "deleteNews",
            data: {
                id: id,
                image: image
            },
            dataType: "json",
            success: function (response) {
                if(response.status == 200) {
                    $("#modal_delete_news").modal("hide");
                    message(response.message);
                    selectNews();
                }
            }
        });
       
    }

    const editNews = (id) => {
        $.ajax({
            type: "POST",
            url: router + "editNews",
            data: { 
                content_id: id
            },
            dataType: "json",
            success: function (response) {
                if(response.status == 200) {
                    let content = response.content;
                    
                    $(".content_id").val(content.id);
                    $(".title").val(content.title);
                    $(".description").val(content.description);
                    $(".status").val(content.status);
                    $(".category").val(content.category);
                    $(".old_image").val(content.image);

                    var img = `
                        <img style="width: 100%; height: 100%;" src="./folder_upload_image/upload_new/${content.image}" alt="img">
                    `;
 
                    $(".image_preview").html(img);


                }
            }
        });
    }


    const updateNews = (form) => {
        let allData = $(form).serializeArray();
        $.ajax({
            type: "POST",
            url: router + "updateNews",
            data: allData,
            dataType: "json",
            success: function (response) {
                if(response.status == 200) {
                    $("#modal_edit_news").modal("hide");
                    message(response.message);
                    selectNews();
                }
            }
        });
    }





    // work with setting start

    const setting_user = () => {
        $.ajax({
            type: "GET",
            url:  "http://localhost:8080/web-news/back-end/ajax/setting.php?type=setting_select",
            dataType: "json",
            success: function (response) {
                if(response.status == 200) {
                    let user = response.user;

                    let result = `
                      <p>ID : <span style="font-weight:bold; color:red;">${user.user_id}</span></p>
                            <p>USERNAME : <span style="font-weight:bold; color:red;">${user.username}</span> </p>
                            <p>EMAIL : <span style="font-weight:bold; color:red;">${user.email}</span></p>
                            </p>
                            <p>PHONE : <span style="font-weight:bold; color:red;">${user.phone}</span></p>
                            </p>
                            <p>LOGIN : <span style="font-weight:bold; color:red;">${user.date}</span></p>
                            </p>
                            <p>POST: <span style="font-weight:bold; color:red;">${response.post}</span>  News</p>
                    `;

                    let img = `
                       <img src="./folder_upload_image/upload_profile/${user.image}" alt="">
                                <i data-bs-toggle="modal" data-bs-target="#changeProfile" class="bi bi-pencil icon_edit_profile_image"></i>
                    `;
 
                    // Assign to form

                    $(".username").val(user.username);
                    $(".email").val(user.email);
                    $(".phone").val(user.phone);
                    


                    $("#my-profile").html(img);
                    $(".profile-detail").html(result);
                }
            }
        });
    }

    setting_user();



    const uploadProfile = (form) => {
        let mydata = new FormData($(form)[0]);
        $.ajax({
            type: "POST",
            url: "http://localhost:8080/web-news/back-end/ajax/setting.php?type=upload_profile",
            data: mydata,
            dataType: "json",
            contentType: false,
            processData: false,
            success: function (response) {
                if(response.status == 200) {

                    let img = `
                       <input type="hidden" name="profile" value="${response.profile}">
                       <img style="width: 100%; height: 100%;" src="./folder_upload_image/tmp/${response.profile}" alt="">
                    `;
 
                    $(".profile-preview").html(img);
                    $(form).trigger('reset');
                }
            }
        });
    }


    const saveProfile = (form) => {
        let profile = $(form).serializeArray();
        $.ajax({
            type: "POST",
            url: "http://localhost:8080/web-news/back-end/ajax/setting.php?type=saveProfile",
            data: profile,
            dataType: "json",
            success: function (response) {
                if(response.status == 200) {
                    $("#changeProfile").modal("hide");
                    message(response.message);
                    setting_user();
                }
            }
        });
    }


    const updateUser = (form) => {
        let update = $(form).serializeArray();

        $.ajax({
            type: "POST",
            url: "http://localhost:8080/web-news/back-end/ajax/setting.php?type=updateUser",
            data: update,
            dataType: "json",
            success: function (response) {
                if(response.status == 200) {
                    message(response.message);
                    setting_user();
                     $('.old_password').removeClass('is-invalid').siblings('p').removeClass('text-danger').text('');
                }else {
                     $('.old_password').addClass('is-invalid').siblings('p').addClass('text-danger').text(response.message);
                }
            }
        });
     }

      // work with setting end

</script>