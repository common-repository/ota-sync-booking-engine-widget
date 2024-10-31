const generateCode = () => {
    const property_id = document.getElementById('property_id').value.trim();
    if(!property_id) {
        alert('Please enter a property id');
        document.getElementById('property_id').focus();
        return;
    }
    const backgroundColor = document.getElementById('backgroundColor').value.trim();
    const textColor = document.getElementById('textColor').value.trim();
    const textAlignment = document.getElementById('textAlignment').value.trim();
    const view = document.getElementById('view').value.trim();
    const fixedBottomPosition = document.getElementById('fixedBottomPosition');
    const language = document.getElementById('language').value;
    const gradient = document.getElementById('gradient').value.trim();
    const backgroundImage = document.getElementById('backgroundImage').value.trim();
    const searchButtonBackgroundColor = document.getElementById('searchButtonBackgroundColor').value.trim();
    const calendarDrops = document.getElementById('calendarDrops').value;
    const propertyType = document.getElementById('propertyType').value;
    const enableChildren = document.getElementById('enableChildren');
    const enablePromo = document.getElementById('enablePromo');
    const borderRadius = document.getElementById('borderRadius').value;
    const inputBorderRadius = document.getElementById('inputBorderRadius').value;
    const buttonBorderRadius = document.getElementById('buttonBorderRadius').value;
    const widgetBorderColor = document.getElementById('widgetBorderColor').value;
    const inputBorderColor = document.getElementById('inputBorderColor').value;
    const buttonBorderColor = document.getElementById('buttonBorderColor').value;
    const widgetBorderThickness = document.getElementById('widgetBorderThickness').value;
    const inputBorderThickness = document.getElementById('inputBorderThickness').value;
    const buttonBorderThickness = document.getElementById('buttonBorderThickness').value;
    const options = {
        view,
        fixedBottomPosition: fixedBottomPosition.checked ? true : false,
        enableChildren: enableChildren.checked ? true : false,
        enablePromo: enablePromo.checked ? true : false,
        language,
        gradient,
        backgroundImage,
        searchButtonBackgroundColor,
        calendarDrops,
        propertyType,
        borderRadius,
        inputBorderRadius,
        buttonBorderRadius,
        widgetBorderColor,
        inputBorderColor,
        buttonBorderColor,
        widgetBorderThickness,
        inputBorderThickness,
        buttonBorderThickness,
        textAlignment
    }
    const code = `
        <div id='engineForm'></div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script id="ew-1" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
        <script type="text/javascript" src="https://app.otasync.me/utils/engineWidget/script.js?v=1"></script>
        <script>
            displayEngineForm("#engineForm", ${property_id}, '${backgroundColor}', '${textColor}', ${JSON.stringify(options)});    
        </script>
    `;


    $('#engine-section').empty();
    const iframe = document.createElement('iframe');
    const html = `<body style="${view === 'vertical'?'':'padding-top: 16rem;'} background:#f2f2f2;">${code}</body>`;
    iframe.srcdoc = html;
    iframe.style.width = '100%';
    iframe.style.height = '120vh';
    iframe.style.minHeight = '100vh';
    $('#engine-section').append(iframe);
    console.log('iframe.contentWindow =', iframe.contentWindow);
    document
    .querySelector("#result")
    .scrollIntoView({ behavior: "smooth" });
    $('#code').val(code);
}

const updateBorderValue = (value, id) => {
    document.getElementById(id).innerHTML = value;
}