// SWEETALERT
// DONE
const SwalDoneSuccess = Swal.mixin({
    icon: 'success',
    confirmButtonColor: color_success,
    allowOutsideClick: false,
});
// /DONE

// ERROR
const SwalError = Swal.mixin({
    icon: 'error',
    iconColor: color_danger,
    confirmButtonColor: color_danger,
    allowOutsideClick: false,
});
// /ERROR
// /SWEETALERT