<a href="javascript:george();" title="Fill my form with data!" alt="Fill my form with data!" style="position: fixed; top: 0; right: 0; background: #000; color: #FFF; padding: 15px; text-decoration: none; font-size: 12pt; font-family: verdana; cursor: pointer;">George :)</a>

<script>
function george () {
    // Object with standard values
    var values = {
        'name': 'George from the Jungle',
        'firstname': 'George',
        'infix': 'from the',
        'lastname': 'from the Jungle',
        'child_dob': '13-06-1988',
        'date_of_birth': '13-06-1988',
        'dateofbirth': '13-06-1988',
        'birthday': '13-06-1988',
        'street': 'Swinningstreetvinelane',
        'housenr': '13',
        'city': 'San Fransisco',
        'postcode': '1234',
        'zipcode': '1234',
        'country': 'Africa',
        'email': 'my-email@dolphiq.nl',
        'email_confirm': 'my-email@dolphiq.nl',
        'message': 'Dinosaurs are extinct today because they lacked opposable thumbs and the brainpower to build a space program. We want to explore. We’re curious people. Look back over history, people have put their lives at stake to go out and explore … We believe in what we’re doing. Now it’s time to go. To be the first to enter the cosmos, to engage, single-handed, in an unprecedented duel with nature—could one dream of anything more?',
        'comment': 'Dinosaurs are extinct today because they lacked opposable thumbs and the brainpower to build a space program. We want to explore. We’re curious people. Look back over history, people have put their lives at stake to go out and explore … We believe in what we’re doing. Now it’s time to go. To be the first to enter the cosmos, to engage, single-handed, in an unprecedented duel with nature—could one dream of anything more?'
    };

    // Config settings
    var stringLengthInput = 2;
    var stringLengthTextarea = 150;
    var selectExcludeFirst = true;

    // Loop over all form fields
    var form = document.getElementsByTagName('form');
    for (var i = 0; i < form[0].length; i++) {
        // Set all info to element
        var element = form[0][i];
        // Check based on element
        switch (element.type) {
            // Input field
            case 'text':
                // If the value exists, otherwise generate a random string
                if (values[element.name] !== '') {
                    element.value = values[element.name];
                } else {
                    element.value = randomString(stringLengthInput);
                }
            break;
            case 'select-one':
                // Count total options
                var optionCount = document.getElementsByName('country')[0].length;

                // Randomly select an item
                if (selectExcludeFirst) {
                    // Select a random option except the first one
                    document.getElementsByName(element.name)[0].selectedIndex = randomNumber(optionCount, 0);
                } else {
                    // Don't care, all is selectable
                    document.getElementsByName(element.name)[0].selectedIndex = randomNumber(optionCount);
                }
                break;
            case 'radio':
            case 'checkbox':
                // Count total options
                var optionCount = document.getElementsByName(element.name).length;

                // Randomly check an item
                document.getElementsByName(element.name)[randomNumber(optionCount)].checked = true;
                break;
            case 'textarea':
                // If the value exists, otherwise generate a random string
                if (values[element.name] !== '') {
                    element.value = values[element.name];
                } else {
                    element.value = randomString(stringLengthTextarea);
                }
                break;
        }
    }
}

// This will create a string. It is possible to define different lengths for the string by setting the words
function randomString (length = 1) {
    // Empty string
    var string = '';

    // Loop adn add a word to the string
    for (i = 1; i <= length; i++) {
        var string = string + ' ' + randomWord()
    }

    // Return the string
    return string;
}

// This wil return a random word from the array
function randomWord () {
    // Array with random words
    var words = [
        'rock',
        'paper',
        'scissors',
        'spock',
        'moon',
        'sun',
        'night',
        'day',
        'some',
        'random',
        'word'
    ];

    // Return a word
    return words[Math.floor(Math.random() * words.length)];
}

// Get a random number between 0 and the option count minus 1
function randomNumber (max = 10, exclude = '') {
    // Check if a exclude is set
    if (exclude === '') {
        return Math.floor(Math.random() * max);
    } else {
        var number = Math.floor(Math.random() * max)
        return (exclude !== number) ? number : randomNumber(max, exclude);
    }
}
</script>