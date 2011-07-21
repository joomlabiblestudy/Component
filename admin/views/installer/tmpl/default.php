<?php
/**
 * @version		$Id: default_form.php 21021 2011-03-27 07:22:54Z infograf768 $
 * @since		7.0
 */
// no direct access
defined('_JEXEC') or die;
?>
<script type="text/javascript">
    Joomla.submitbutton = function(pressbutton) {
        var form = document.getElementById('adminForm');

        // do field validation
        if (form.install_package.value == ""){
            alert("<?php echo JText::_('COM_INSTALLER_MSG_INSTALL_PLEASE_SELECT_A_PACKAGE', true); ?>");
        } else {
            form.installtype.value = 'upload';
            form.submit();
        }
    }
        
    Joomla.submitbutton3 = function(pressbutton) {
        var form = document.getElementById('adminForm');

        // do field validation
        if (form.install_directory.value == ""){
            alert("<?php echo JText::_('COM_INSTALLER_MSG_INSTALL_PLEASE_SELECT_A_DIRECTORY', true); ?>");
        } else {
            form.installtype.value = 'folder';
            form.submit();
        }
    }

    Joomla.submitbutton4 = function(pressbutton) {
        var form = document.getElementById('adminForm');

        // do field validation
        if (form.install_url.value == "" || form.install_url.value == "http://"){
            alert("<?php echo JText::_('COM_INSTALLER_MSG_INSTALL_ENTER_A_URL', true); ?>");
        } else {
            form.installtype.value = 'url';
            form.submit();
        }
    }
</script>

<form enctype="multipart/form-data" action="<?php echo JRoute::_('index.php?option=com_biblestudy&view=installer'); ?>" method="post" name="adminForm" id="adminForm">
    <div class="width-100 fltlft">
        <fieldset class="uploadform">
            <legend><?php echo JText::_('COM_INSTALLER_UPLOAD_PACKAGE_FILE'); ?></legend>
            <label for="install_package"><?php echo JText::_('COM_INSTALLER_PACKAGE_FILE'); ?></label>
            <input class="input_box" id="install_package" name="install_package" type="file" size="57" />
            <input class="button" type="button" value="<?php echo JText::_('COM_INSTALLER_UPLOAD_AND_INSTALL'); ?>" onclick="Joomla.submitbutton()" />
        </fieldset>
        <fieldset>
            <legend><?php echo JText::_('TEMP_INSTALLED_EXTENSIONS'); ?></legend>
            <table class="adminlist">
                <thead
                    <tr>
                        <th width="20"><input type="checkbox" name="checkall-toggle" value="" onclick="checkAll(this)" /></th>
                        <th class="nowrap"><?php //echo JHtml::_('grid.sort', 'COM_INSTALLER_HEADING_NAME', 'name', $listDirn, $listOrder); ?></th>
                        <th class="center"><?php //echo JHtml::_('grid.sort', 'COM_INSTALLER_HEADING_TYPE', 'type', $listDirn, $listOrder); ?></th>
                        <th width="10%" class="center"><?php echo JText::_('JVERSION'); ?></th>
                        <th width="10%" class="center"><?php echo JText::_('JDATE'); ?></th>
                        <th><?php //echo JHtml::_('grid.sort', 'COM_INSTALLER_HEADING_FOLDER', 'folder', $listDirn, $listOrder); ?></th>
                        <th><?php //echo JHtml::_('grid.sort', 'COM_INSTALLER_HEADING_CLIENT', 'client_id', $listDirn, $listOrder); ?></th>
                        <th width="15%" class="center"><?php echo JText::_('JAUTHOR'); ?></th>
                        <th width="10"><?php //echo JHtml::_('grid.sort', 'COM_INSTALLER_HEADING_ID', 'extension_id', $listDirn, $listOrder); ?></th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <td colspan="20"><?php //echo $this->pagination->getListFooter(); ?></td>
                    </tr>
                </tfoot>
                <tbody>
                    <tr>
                        <td colspan="20" align="center">You have no extensions installed</td>
                    </tr>
                </tbody>
            </table>
        </fieldset>
        <input type="hidden" name="type" value="" />
        <input type="hidden" name="installtype" value="upload" />
        <input type="hidden" name="task" value="installer.install" />
        <?php echo JHtml::_('form.token'); ?>
    </div>
</form>
