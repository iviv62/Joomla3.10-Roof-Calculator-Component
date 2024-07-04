<?php
defined('_JEXEC') or die;

?>


<div class="form-container">
    <h2>Това е калкулатор за едноскатен покрив</h2>
    {loadmoduleid 95}
    <h3 class="form-title">Размери на вашия покрив:</h3>
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
        <br>
        <button type="submit" class="calculate-btn">Изчисли</button>
        <?php echo JHtml::_('form.token'); ?>
    </form>

    <div id="calc-result-container"></div>

    <div class="info-container">
        <ul>
            <li><span class="info-highlight">L</span> е дължината на покрива</li>
            <li><span class="info-highlight">I</span> е ширината на покрива</li>
            <li><span class="info-highlight">H</span> е височината на покрива</li>
            <li>За десетични размери използвайте точка за разделител! (.)</li>
        </ul>
    </div>
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
        

        fetch('<?php echo JRoute::_('index.php?option=com_calculator&task=shedroofcalculator.calculate'); ?>', {
            method: 'POST',
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                //TODO CHANGE THIS
                resultContainer.innerHTML = '<p class="success">' + data.message + '</p>';
            } else {
                resultContainer.innerHTML = '<p class="error">' + data.message + '</p>';
            }
        })
        .catch(error => {
            console.error('Error:', error);
            resultContainer.innerHTML = '<p class="error">An error occurred. Please try again.</p>';
        });
    });
});
</script>