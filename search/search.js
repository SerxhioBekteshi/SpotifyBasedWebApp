$("#search").on("click", function()
{
    kerko();
});

function kerko()
{
    $("#searchbox").show();
    $('#searchbox').keyup(function()
    {
        // Search text
        var text = $(this).val();
        console.log(text);
        // Hide all content class element
        $('.permbajtje').hide();

        // Search and show
        $('.permbajtje:contains("'+text+'")').show();
    });
}