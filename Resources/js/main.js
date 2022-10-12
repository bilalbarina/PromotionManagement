$("#create-button").on("click", () => {
  $("#create-form").show();
  $("#index").hide();
});

$("#search-input")
.on('focus', () => $('#search-result').show())
// .on('focusout', () => $('#search-result').hide())
.on("input", function () {
  let resultList = $("<ul/>");
  $.ajax("/?page=search&title=" + this.value, {
    accepts: "json",
    success: (res) => {
      if (res.success) {
        for (let resultId in res.results) {
            let promotion = res.results[resultId];
            resultList.append(
                $('<li/>')
                .attr('class', 'text-blue-600 cursor-pointer')
                .text(promotion.title)
            )
        }
      }
    },
  });
  $('#search-result').html(resultList)
});

function editPromo(promoID) {
  $("#edit-form-" + promoID).show();
  $("#promo-" + promoID).hide();
}
