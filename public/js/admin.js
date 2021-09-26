function currency(numb) {
    var num = Number(numb);
    if (num) {
        return "₦ " + num.toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
    } else {
        return "₦ 0.00";
    }
}
$("#viewdetail").on("show.bs.modal", function(event) {
    var info = $(event.relatedTarget);
    var username = info.data("username");
    var email = info.data("email");
    var checkin = info.data("checkin");
    var checkout = info.data("checkout");
    var roomname = info.data("roomname") + " Apartment";
    var rooms = info.data("rooms");
    var pricepernight = info.data("pricepernight");
    var guests = info.data("guests");
    var nights = info.data("nights");
    var payment_type = info.data("payment_type");
    var totalprice = info.data("totalprice");
    var payment_status = info.data("payment_status");
    var amountpaid = info.data("amountpaid");

    var modal = $(this);

    modal.find(".modal-title").text("Reservation detail");
    modal.find(".modal-body #username").text(username);
    modal.find(".modal-body #email").text(email);
    modal.find(".modal-body #rooms").text(rooms);
    modal.find(".modal-body #checkin").text(moment(checkin).format("ll"));
    modal.find(".modal-body #checkout").text(moment(checkout).format("ll"));
    modal.find(".modal-body #roomname").text(roomname);
    modal.find(".modal-body #pricepernight").text(currency(pricepernight));
    modal.find(".modal-body #guests").text(guests);
    modal.find(".modal-body #nights").text(nights);
    modal.find(".modal-body #payment_type").text(payment_type);
    modal.find(".modal-body #totalprice").text(currency(totalprice));
    modal.find(".modal-body #payment_status").text(payment_status);
    modal.find(".modal-body #amountpaid").text(currency(amountpaid));
});
