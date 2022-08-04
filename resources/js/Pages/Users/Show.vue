<template>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{title}}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>

                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->


            <!-- Default box -->




                    <!-- Main content -->
                    <section class="content">
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <label >Имя</label>
                                    <p>{{user.name}}</p>
                                </div>
                            </div>
                        </div>
                        <!-- /.card -->

                    </section>
                    <!-- /.content -->
                </div>

                <!-- /.card-body -->

                    <!-- /.card-footer-->


            <!-- /.card -->
            <div class="card-footer">
                Footer
            </div>

        <!-- /.content -->

</template>

<script>
export default {
    props:{
        title: String,
        user: Object
    }
}
</script>

<style scoped>

</style>
