// SWEETALERT
// QUESTION
 const SwalQuestionDanger = Swal.mixin({
     icon: 'question',
     iconColor: color_danger,
     confirmButtonColor: color_danger,
     showCancelButton: true,
     cancelButtonColor: color_primary,
     allowOutsideClick: false,
 })
// /QUESTION

// DONE
const SwalDoneSuccess = Swal.mixin({
    icon: 'success',
    confirmButtonColor: color_success,
    allowOutsideClick: false,
})
// /DONE

// ERROR
const SwalError = Swal.mixin({
    icon: 'error',
    iconColor: color_danger,
    confirmButtonColor: color_danger,
    allowOutsideClick: false,
})

const SwalSystemError = Swal.mixin({
    icon: 'error',
    iconColor: color_danger,
    title: 'System Error!',
    text: 'Please refresh the page and try again. Still cannot proceed please contact the system administrator',
    confirmButtonColor: color_danger,
    allowOutsideClick: false,
})

const SwalInvalidIdError = Swal.mixin({
    icon: 'error',
    iconColor: color_danger,
    title: 'Invalid Id',
    text: 'Please refresh the page and try again. Still cannot proceed please contact the system administrator',
    confirmButtonColor: color_danger,
    allowOutsideClick: false,
})
// /ERROR

// NOTIFICATION
const SwalNotificationWarningAutoClose = Swal.mixin({
    icon: 'warning',
    iconColor: color_warning,
    showConfirmButton: false,
    toast: true,
    position: 'top-end',
    timer: 6000,
    timerProgressBar: true,
})
// /NOTIFICATION
// /SWEETALERT