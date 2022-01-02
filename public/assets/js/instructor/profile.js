var avatar = new KTImageInput('kt_user_avatar');
document.querySelector("input[name=profile_avatar]").addEventListener('change', 
    (e)=>{
        var file = e.target.files[0];
        if(file.size > 2200000){
            swal.fire({
                text: "Image should be 2mb or less",
                icon: "error",
                buttonsStyling: false,
                confirmButtonText: "Ok got it",
                customClass: {
                    confirmButton: "btn font-weight-bold btn-light-primary"
                }
            }).then(()=> avatar.cancel.click());
           

            return false;
        }
        // swal.fire({
        //         text: "Image Uploaded",
        //         icon: "success",
        //         buttonsStyling: false,
        //         confirmButtonText: "Ok got it",
        //         customClass: {
        //             confirmButton: "btn font-weight-bold btn-light-primary"
        //         }
        //     });
        console.log();
    });
