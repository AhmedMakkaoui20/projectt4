// Function to detect credit card type based on IIN
function detectCardType(cardNumber) {
    // Extract the first 2 digits (IIN) from the card number
    const iin = cardNumber.substring(0, 2);

    // Check common IIN patterns to determine card type
    if (/^5[1-5]/.test(iin)) {
        return "MasterCard";
    } else if (/^4/.test(iin)) {
        return "Visa";
    } else if (/^34|^37/.test(cardNumber)) {
        return "American Express";
    } else {
        return "Unknown";
    }
}

// Function to update the card type display
function updateCardTypeDisplay() {
    // Get the card number input element
    const cardNumberInput = document.getElementById("card_number");

    // Get the card type display element
    const cardTypeDisplay = document.getElementById("card_type_display");

    // Get the entered card number
    const cardNumber = cardNumberInput.value;

    // Detect the card type
    const cardType = detectCardType(cardNumber);

    // Update the card type display
    cardTypeDisplay.textContent = `Card Type: ${cardType}`;
}

// Attach an event listener to the card number input
document.getElementById("card_number").addEventListener("input", updateCardTypeDisplay);
