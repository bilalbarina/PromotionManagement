$("#create-button").on("click", () => {
  $("#create-form").show();
  $("#index").hide();
});

$("#search-input")
  .on("focus", () => $("#search-result").show())
  // .on("focusout", () => $("#search-result").hide())
  .on("input", function () {
    let ul = $("<ul/>");
    $.ajax("./?page=search&title=" + this.value, {
      accepts: "json",
      success: (res) => {
        if (res.success) {
          for (let resultId in res.results) {
            let promotion = res.results[resultId];
            let li = $("<li/>").attr("class", "text-blue-600 cursor-pointer");
            li.append(
              $("<a/>")
                .attr("href", `./?page=index&id=${promotion.id}`)
                .text(promotion.title)
            );
            ul.append(li);
          }
        }
      },
    });
    $("#search-result").html(ul);
  });

function editPromo(promoID) {
  $("#edit-form-" + promoID).show();
  $("#promo-" + promoID).hide();
}
