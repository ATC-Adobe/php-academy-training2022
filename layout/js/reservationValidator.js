
window.addEventListener('load', () => {

    $('timeFrom').addEventListener('change', validateFrom)
    $('timeTo').addEventListener('change', validateTo)
})

function validateFrom() {
    let d1 = Date.parse( $('timeFrom').value )

    if(d1 < (new Date()).getTime()) {
        $('message').innerHTML = "Cannot reserve room in the past"
    }
    else {
        $('message').innerHTML = ""
        validateTo()
    }
}

function validateTo() {
    let d1 = Date.parse( $('timeFrom').value )
    let d2 = Date.parse( $('timeTo').value )

    let mess = $('message')

    if(mess.innerHTML === '') {
        if (d2 <= d1) {
            mess.innerHTML = 'End time is earlier then Start time'
        } else {
            mess.innerHTML = ""
        }
    }

}




