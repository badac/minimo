<?php echo $this->form('search-form', $options['form_attributes']); ?>
    <?php echo $this->formText('query', $filters['query'], array('title' => __('Search'))); ?>
    <?php if ($options['show_advanced']): ?>
    <fieldset id="advanced-form">
        <fieldset id="query-types">
            <p><?php echo __('Search using this query type:'); ?></p>
            <?php echo $this->formRadio('query_type', $filters['query_type'], null, $query_types); ?>
        </fieldset>
        <?php if ($record_types): ?>
        <fieldset id="record-types">
            <p><?php echo __('Search only these record types:'); ?></p>
            <?php foreach ($record_types as $key => $value): ?>
                <?php $lowerKey = strtolower($key); ?>
                <?php echo $this->formCheckbox("record_types-$lowerKey", $key, in_array($lowerKey, $filters['record_types']) ? array('checked' => true, 'id' => 'record_types-' . $key) : null); ?> <?php echo $this->formLabel("record_types[$lowerKey]", $value); ?><br>
            <?php endforeach; ?>
        </fieldset>
        <?php elseif (is_admin_theme()): ?>
            <p><a href="<?php echo url('settings/edit-search'); ?>"><?php echo __('Go to search settings to select record types to use.'); ?></a></p>
        <?php endif; ?>
        <p><?php echo link_to_item_search(__('Advanced Search (Items only)')); ?></p>
    </fieldset>
    <?php endif; ?>
    <?php echo $this->formSubmit(null, $options['submit_value']); ?>
</form>