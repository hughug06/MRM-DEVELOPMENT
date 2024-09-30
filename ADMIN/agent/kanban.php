<?php 
require_once '../authetincation.php';
require_once '../../Database/database.php';
?>

<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light" data-menu-styles="dark" data-toggled="close">

    <head>

        <!-- Meta Data -->
        <?php include_once(__DIR__.'../../../partials/head.php')?>
        <title> Inquries </title>
        <!-- Favicon -->
        <link rel="icon" href="../../assets/images/brand-logos/favicon.ico" type="image/x-icon">
        
        <!-- Choices JS -->
        <script src="../../assets/libs/choices.js/public/assets/scripts/choices.min.js"></script>
        
        <!-- Bootstrap Css -->
        <link id="style" href="../../assets/libs/bootstrap/css/bootstrap.min.css" rel="stylesheet" >

        <!-- Main Theme Js -->
        <script src="../../assets/js/main.js"></script>

        <!-- Style Css -->
        <link href="../../assets/css/styles.min.css" rel="stylesheet" >

        <!-- Icons Css -->
        <link href="../../assets/css/icons.css" rel="stylesheet" >

        <!-- Node Waves Css -->
        <link href="../../assets/libs/node-waves/waves.min.css" rel="stylesheet" > 

        <!-- Simplebar Css -->
        <link href="../../assets/libs/simplebar/simplebar.min.css" rel="stylesheet" >
        
        <!-- Color Picker Css -->
        <link rel="stylesheet" href="../../assets/libs/flatpickr/flatpickr.min.css">
        <link rel="stylesheet" href="../../assets/libs/@simonwep/pickr/themes/nano.min.css">

        <!-- Choices Css -->
        <link rel="stylesheet" href="../../assets/libs/choices.js/public/assets/styles/choices.min.css">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dragula/3.7.2/dragula.min.css">

        <style>
            .task {
                position: relative;
                border: 1px solid #dee2e6;
                border-radius: 5px;
                padding: 5px;
                margin-bottom: 5px;
                cursor: move;
                transition: transform 0.2s, background-color 0.2s;
            }

            .task:hover {
                background-color: rgb(var(--primary-rgb));
                color: #fff;
                transform: scale(1.02);
            }

            .task .remove-btn {
                visibility: hidden;
                transition: visibility 0.2s;
            }

            .task:hover .remove-btn {
                visibility: visible;
            }
            
        </style>
    </head>

    <body>

        <div class="page">
            <!-- app-header -->
            <?php include_once('../../partials/header.php')?>
            <!-- /app-header -->
            <!-- Start::app-sidebar -->
            <?php include_once('../../partials/sidebar.php')?>
            <!-- End::app-sidebar -->

            <!-- Start::app-content -->
            <div class="main-content app-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="d-flex mt-4 mb-4">
                            <h1 class="my-auto">Kanban</h1>
                            <button class="btn btn-primary ms-auto" data-bs-toggle="modal" data-bs-target="#addTaskModal" id="addTaskBtn">Add Task</button>
                        </div>
                        <div class="col-lg 4">
                            <div class="card custom-card">
                                <div class="card-header">
                                    <div class="card-title">To Do</div>
                                </div>
                                <div class="card-body" id="todo">
                                    <div class="task p-3 d-flex justify-content-between align-items-center">
                                        task 1
                                        <button class="btn-close remove-btn" aria-label="Remove"></button>
                                    </div>
                                    <div class="task p-3 d-flex justify-content-between align-items-center">
                                        task 1
                                        <button class="btn-close remove-btn" aria-label="Remove"></button>
                                    </div>
                                    <div class="task p-3 d-flex justify-content-between align-items-center">
                                        task 1
                                        <button class="btn-close remove-btn" aria-label="Remove"></button>
                                    </div>
                                    <div class="task p-3 d-flex justify-content-between align-items-center">
                                        task 1
                                        <button class="btn-close remove-btn" aria-label="Remove"></button>
                                    </div>
                                    <div class="task p-3 d-flex justify-content-between align-items-center">
                                        task 1
                                        <button class="btn-close remove-btn" aria-label="Remove"></button>
                                    </div>
                                </div>
                            </div>    
                        </div>
                        <div class="col-lg-4">
                            <div class="card custom-card">
                                <div class="card-header">
                                    <div class="card-title">In Progress</div>
                                </div>
                                <div class="card-body" id="in-progress">
                                    <div class="task p-3 d-flex justify-content-between align-items-center">
                                        task 1
                                        <button class="btn-close remove-btn" aria-label="Remove"></button>
                                    </div>
                                    <div class="task p-3 d-flex justify-content-between align-items-center">
                                        task 1
                                        <button class="btn-close remove-btn" aria-label="Remove"></button>
                                    </div>
                                    <div class="task p-3 d-flex justify-content-between align-items-center">
                                        task 1
                                        <button class="btn-close remove-btn" aria-label="Remove"></button>
                                    </div>
                                    <div class="task p-3 d-flex justify-content-between align-items-center">
                                        task 1
                                        <button class="btn-close remove-btn" aria-label="Remove"></button>
                                    </div>
                                    <div class="task p-3 d-flex justify-content-between align-items-center">
                                        task 1
                                        <button class="btn-close remove-btn" aria-label="Remove"></button>
                                    </div>
                                </div>
                            </div>    
                        </div>
                        <div class="col-lg-4">
                            <div class="card custom-card">
                                <div class="card-header">
                                    <div class="card-title">Done</div>
                                </div>
                                <div class="card-body" id="done">
                                    <div class="task p-3 d-flex justify-content-between align-items-center">
                                        task 1
                                        <button class="btn-close remove-btn" aria-label="Remove"></button>
                                    </div>
                                    <div class="task p-3 d-flex justify-content-between align-items-center">
                                        task 1
                                        <button class="btn-close remove-btn" aria-label="Remove"></button>
                                    </div>
                                    <div class="task p-3 d-flex justify-content-between align-items-center">
                                        task 1
                                        <button class="btn-close remove-btn" aria-label="Remove"></button>
                                    </div>
                                    <div class="task p-3 d-flex justify-content-between align-items-center">
                                        task 1
                                        <button class="btn-close remove-btn" aria-label="Remove"></button>
                                    </div>
                                    <div class="task p-3 d-flex justify-content-between align-items-center">
                                        task 1
                                        <button class="btn-close remove-btn" aria-label="Remove"></button>
                                    </div>
                                </div>
                            </div>    
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="addTaskModal" tabindex="-1" aria-labelledby="addTaskModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addTaskModalLabel">Add Task</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <input type="text" class="form-control" id="taskName" placeholder="Enter task name">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" id="saveTaskBtn">Save Task</button>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>

            <!-- End::app-content -->
            <!-- Footer Start -->
            <?php include_once('../../partials/footer.php') ?>
            <!-- Footer End -->
        </div>

        
        <!-- Scroll To Top -->
        <div class="scrollToTop d-none">
            <span class="arrow"><i class="fe fe-arrow-up"></i></span>
        </div>
        <div id="responsive-overlay"></div>
        <!-- Scroll To Top -->

        <!-- Popper JS -->
        <script src="../../assets/libs/@popperjs/core/umd/popper.min.js"></script>

        <!-- Bootstrap JS -->
        <script src="../../assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Defaultmenu JS -->
        <script src="../../assets/js/defaultmenu.min.js"></script>

        <!-- Node Waves JS-->
        <script src="../../assets/libs/node-waves/waves.min.js"></script>

        <!-- Sticky JS -->
        <script src="../../../assets/js/sticky.js"></script>

        <!-- Simplebar JS -->
        <script src="../../assets/libs/simplebar/simplebar.min.js"></script>
        <script src="../../assets/js/simplebar.js"></script>

        <!-- Color Picker JS -->
        <script src="../../assets/libs/@simonwep/pickr/pickr.es5.min.js"></script>

        <!-- Custom-Switcher JS -->
        <script src="../../assets/js/custom-switcher.min.js"></script>

        <!-- Custom JS -->
        <script src="../../assets/js/custom.js"></script>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/dragula/3.7.2/dragula.min.js"></script>

        <script>
            // Drag and drop functionality
            const drake = dragula([document.getElementById('todo'), document.getElementById('in-progress'), document.getElementById('done')]);
            let id = 1;

            // Add Task button functionality
            document.getElementById('saveTaskBtn').addEventListener('click', function () {
                const taskName = document.getElementById('taskName').value;
                if (taskName) {
                    const newTask = document.createElement('div');
                    newTask.className = 'task p-3 d-flex justify-content-between align-items-center';
                    newTask.innerHTML = `
                        ${id}. ${taskName}
                        <button class="btn-close remove-btn" aria-label="Remove"></button>
                    `;
                    id++;
                    
                    // Append task to the "To Do" section
                    document.getElementById('todo').appendChild(newTask);

                    // Clear input field and close modal
                    document.getElementById('taskName').value = '';
                    const modal = bootstrap.Modal.getInstance(document.getElementById('addTaskModal'));
                    modal.hide();
                }
            });

            // Delegate event listener to handle task removal
            document.addEventListener('click', function(e) {
                if (e.target && e.target.classList.contains('remove-btn')) {
                    e.target.parentElement.remove();
                }
            });
        </script>
        
    </body>

</html>