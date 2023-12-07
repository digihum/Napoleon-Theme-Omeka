    <?php echo $this->form('search-form', $options['form_attributes']); ?>
        <div class="form-group">
            <?php echo $this->formText('query', $filters['query'], array('class'=>'form-control', 'placeholder'=>'Search the collection')); ?>
            <!--<button type="submit" class="btn btn-default">Search</button> -->
        </div>
    </form>
