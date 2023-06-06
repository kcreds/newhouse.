  var textContainer = document.getElementById("text-limit");
  var descContainer = document.getElementById("desc-limit")
  var descContainer2 = document.getElementById("desc-limit2")

  if(textContainer)
{
  var text = textContainer.innerHTML;
  var maxLength = 700; // Maksymalna długość tekstu, po której następuje ucinanie
  var truncatedText = text.substring(0, maxLength);
  var lastPeriodIndex = truncatedText.lastIndexOf("."); 

  if (lastPeriodIndex !== -1) {
    truncatedText = truncatedText.substring(0, lastPeriodIndex + 1); 
  }
  textContainer.innerHTML = truncatedText
}

  if(descContainer && descContainer2)
    {
        maxLength = 500;
        truncatedText = text.substring(0, maxLength);
        var lastPeriodIndex = truncatedText.lastIndexOf(".");
        truncatedText = truncatedText.substring(0, lastPeriodIndex + 1);
        if (lastPeriodIndex !== -1) {
            truncatedText = truncatedText.substring(0, lastPeriodIndex + 1); 
        }
        descContainer.innerHTML = truncatedText 
        descContainer2.innerHTML = truncatedText 
    }

   
