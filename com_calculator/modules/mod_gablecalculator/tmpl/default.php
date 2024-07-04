<?php
defined('_JEXEC') or die;

?>

<div class="form-container">
    <h2>Това е калкулатор за двускатен покрив</h2>

    <div class="info-container">
        <ul>
            <li><span class="info-highlight">L</span> е дължината на покрива</li>
            <li><span class="info-highlight">I</span> е ширината на покрива</li>
            <li><span class="info-highlight">H</span> е височината на покрива</li>
            <li>За десетични размери използвайте точка за разделител! (.)</li>
        </ul>
    </div>

    <h3 class="form-title">Въведи размерите на вашия покрив:</h3>
    <form id="roof-dimensions-form"  action="javascript:void(0);" >
        <div class="input-group">
            <label for="length">L</label>
            <input type="number" id="length" name="length" placeholder="20">
        </div>
        <div class="input-group">
            <label for="width">I</label>
            <input type="number" id="width" name="width" placeholder="8">
        </div>
        <div class="input-group">
            <label for="height">H</label>
            <input type="number" id="height" name="height" placeholder="3">
        </div>

        <div id="calc-result-container"></div>

        <br>
        <button type="submit" class="calculate-btn">Изчисли</button>
        <?php echo JHtml::_('form.token'); ?>
    </form>

    <div id="calc-result-container"></div>


</div>

<script type="text/javascript">
document.addEventListener('DOMContentLoaded', function() {
    var form = document.getElementById('roof-dimensions-form');
    var resultContainer = document.getElementById('calc-result-container');

    form.addEventListener('submit', function(e) {
        e.preventDefault();
       
        
        var formData = new FormData(form);


        // Get the token from the form
        var token = document.querySelector('input[name="' +  '<?php echo JSession::getFormToken(); ?>' + '"]');
        formData.append(token.name, token.value);
        

        fetch('<?php echo JRoute::_('index.php?option=com_calculator&task=gableroofcalculator.calculate'); ?>', {
            method: 'POST',
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(response => response.json())
        .then(data => {
            resultContainer.innerHTML = '';
            const messageParagraph = document.createElement('p');

            if (data.success) {
                messageParagraph.className = 'success';
            } else {
                messageParagraph.className = 'error';
            }

            messageParagraph.textContent = data.message;
            resultContainer.appendChild(messageParagraph);
        })
        .catch(error => {
            console.error('Error:', error);
            resultContainer.innerHTML = '';
            const errorParagraph = document.createElement('p');
            errorParagraph.className = 'error';
            errorParagraph.textContent = 'An error occurred. Please try again.';
            resultContainer.appendChild(errorParagraph);
        });
    });
});
</script>
