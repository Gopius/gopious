var avatar = new KTImageInput('kt_user_avatar');
var avatar_logo = new KTImageInput('kt_long_logo');
var avatar_icon = new KTImageInput('kt_square_logo');

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
        
        console.log();
    });


document.querySelector("input[name=profile_avatar_logo]").addEventListener('change', 
    (e)=>{
        var file = e.target.files[0];
        if(file.size > 500000){
            swal.fire({
                text: "Image should be 500kb or less",
                icon: "error",
                buttonsStyling: false,
                confirmButtonText: "Ok got it",
                customClass: {
                    confirmButton: "btn font-weight-bold btn-light-primary"
                }
            }).then(()=> avatar_logo.cancel.click());
           

            return false;
        }
        
        console.log();
    });


document.querySelector("input[name=profile_avatar_icon]").addEventListener('change', 
    (e)=>{
        var file = e.target.files[0];
        if(file.size > 100000){
            swal.fire({
                text: "Image should be 100kb or less",
                icon: "error",
                buttonsStyling: false,
                confirmButtonText: "Ok got it",
                customClass: {
                    confirmButton: "btn font-weight-bold btn-light-primary"
                }
            }).then(()=> avatar_icon.cancel.click());
           

            return false;
        }
        
        console.log();
    });
