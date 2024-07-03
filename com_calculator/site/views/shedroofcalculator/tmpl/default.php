<?php
defined('_JEXEC') or die;

?>


<div class="form-container">
    <h2>This is View for shed roof calculator</h2>
    <h3 class="form-title">Your roof dimensions:</h3>
    <form id="roof-dimensions-form"  action="javascript:void(0);" >
        <div class="input-group">
            <label for="length">L</label>
            <input type="text" id="length" name="length" placeholder="20">
        </div>
        <div class="input-group">
            <label for="width">I</label>
            <input type="text" id="width" name="width" placeholder="8">
        </div>
        <div class="input-group">
            <label for="height">H</label>
            <input type="text" id="height" name="height" placeholder="3">
        </div>
        <br>
        <button type="submit" class="calculate-btn">Calculate</button>
        <?php echo JHtml::_('form.token'); ?>
    </form>

    <div id="calc-result-container"></div>

    <div class="info-container">
        <ul>
            <li><span class="info-highlight">L</span> is the length of the roof</li>
            <li><span class="info-highlight">I</span> is the width of the roof</li>
            <li><span class="info-highlight">H</span> is the rise (height) of the roof</li>
            <li>For decimal dimensions, use the dot notation! (.)</li>
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
        ///TASK CALCULATE
        //formData.append('task', 'shedroofcalculator.calculate');

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