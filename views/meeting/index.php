<div class="section" style="background-color: #E6F0FF; ">
    <span style="font-size: larger; font-weight: bold;">Meetings</span>
    <!--
    <span style="float: right;">
        <a href="/scheduler/meeting/createmeeting"class="topLinkButton">Create</a>
    </span>-->
</div>
<hr/>

<div class="section ui-widget">
   
<?php
    $meetingElementId=0;
    foreach ($this->data['meetings'] as $meeting)
    {?>
        
        <div meetingElementId="<?php echo $meetingElementId; ?>"
            class="meeting ui-widget-content ui-corner-all"
            ownerId="<?php echo $meeting['owner']['id']; ?>"
            employeeId="<?php echo Session::get('id'); ?>"
            >
            <div class="meeting-toppanel">
                <span id="meeting-button-edit-<?php echo $meetingElementId;?>"
                        class="meeting-button-edit"
                        meetingElementId="<?php echo $meetingElementId; ?>"
                    >
                    <span class="ui-icon ui-icon-pencil" style="margin:0px; padding: 0px;"></span>
                </span
                ><span id="meeting-header-<?php echo $meetingElementId;?>" 
                    class="meeting-header ui-state-default" meetingElementId="<?php echo $meetingElementId; ?>"
                    >
                    <span style="color: #80CC80;">
                        <?php echo $meeting['name']; ?>
                    </span>
                    <span style="font-size: small;">
                        <?php 
                        echo ' ('.$meeting['start'].' to '. $meeting['end'] . ')'; 
                        ?>
                    </span>
                </span>
            </div>
            <div id="meeting-content-<?php echo $meetingElementId;?>"
                class="meeting-content" meetingElementId="<?php echo $meetingElementId; ?>">
                <span style="font-size: medium; font-style: italic; color: #FFD7A6;">
                <?php 
                $i=0;
                foreach ($meeting['members'] as $member) 
                {
                    if($i==0)
                    {
                        echo $member['name'];
                    }
                    else {
                        echo ', '.$member['name'];
                    }
                    $i++;
                }?>
                </span>
                <br/>
                <span style="font-size: medium;"><?php echo $meeting['description']; ?></span>
            </div>
        </div>
<?php
    $meetingElementId++;
    }?>
   
</div>