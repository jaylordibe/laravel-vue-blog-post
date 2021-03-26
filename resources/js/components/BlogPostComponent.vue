<template>
    <section>
        <div class="box-header with-border">
            <div class="user-block">
                <img class="img-circle" src="https://img.icons8.com/color/36/000000/guest-male.png" alt="User Image">
                <span class="username">
                    <a href="#" data-abc="true">John Doe</a>
                </span>
                <span class="description">Public - 7:30 PM Today</span>
            </div>
            <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="" data-original-title="Mark as read">
                    <i class="fa fa-circle-o"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="collapse">
                    <i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove">
                    <i class="fa fa-times"></i>
                </button>
            </div>
        </div>
        <div class="box-body">
            <img class="img-fluid pad" src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1557148425/woman-570883_1280.jpg" alt="Photo">
            <!--<button type="button" class="btn btn-default btn-xs">
                <i class="fa fa-share"></i> Share
            </button>
            <button type="button" class="btn btn-default btn-xs">
                <i class="fa fa-thumbs-o-up"></i> Like
            </button>
            <span class="pull-right text-muted">127 likes - 3 comments</span>-->
        </div>
    </section>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.');
        }
    }
</script>
