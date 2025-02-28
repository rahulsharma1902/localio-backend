@extends('vendor_dashboard_layout.master')
@section('meta_title', $metaTitle)
@section('meta_description', $metaDescription)
@section('content')
<div class="col-lg-9 p-0">
    <div class="user_content">
        <div class="edit-listing">
            <h2>{{ __('file.edit-listing') }}</h2>
            <div class="edit-boxs">
                <div class="edit-box " style="background-color:#06498B1A; border: 0px;">
                    <div class="edit-icon">
                        <a href="javascript:void(0)"><i class="fa-solid fa-pencil"></i></a>
                    </div>
                    <div class="editable-content mt-15">
                        <div class="user-info">
                            <div class="user-name1">
                                <img src="{{asset('vender_dashboard/img/edit1.png')}}" alt="Asana" class="logo">
                            </div>
                            <div class="user-data">
                                <div class="user-name d-flex">
                                    <h4>Asana</h4>
                                    <i class="fa-regular fa-heart"></i>
                                </div>
                                <div class="rating">
                                    <div class="star-box">
                                        <span>5.0</span>
                                        <div class="star">
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                        </div>
                                        <div class="down-arrow">
                                            <i class="fa-solid fa-chevron-down"></i>
                                        </div>
                                    </div>
                                    <p>124 ratings</p>
                                </div>
                            </div>

                        </div>
                        <div class="rgt-edit-data">
                            <div class="share">
                                <a href="javascript:void(0)"><img src="{{asset('vender_dashboard/img/share.png')}}" alt=""></a>
                            </div>
                            <div class="edit-btn">
                                <a href="javascript:void(0)" class="btn unq_btn">{{ __('file.visit_Website') }}<img
                                        src="{{asset('vender_dashboard/img/arrowdown.png')}}" alt=""></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="edit-box">
                    <div class="edit-icon">
                        <a href="javascript:void(0)"><i class="fa-solid fa-pencil"></i></a>
                    </div>
                    <div class="editable-content-2 mt-15">
                        <div class="features">
                            <div class="feature-box blue-border">
                                <div class="top-img">
                                    <img src="{{asset('vender_dashboard/img/feature-top.png')}}" alt="">
                                </div>
                                <ul>
                                    <li>Free domain & SSL certificate</li>
                                    <li>Customizable automatic updates</li>
                                    <li>Scalable performance management</li>
                                    <li>DDoS & malware protection</li>
                                </ul>
                            </div>
                            <div class="feature-box">
                                <div class="price-box">
                                    <p>{{ __('file.Starting_Price') }}</p>
                                    <p class="price">
                                        <span>$9</span> {{ __('file./Month') }}
                                    </p>
                                </div>
                            </div>
                            <div class="feature-box">
                                <div class="check-img">
                                    <img src="{{asset('vender_dashboard/img/check.png')}}" alt="">
                                </div>
                                <h6>{{ __('file.free_trail') }} <br>
                                    {{ __('file.available') }}</h6>
                                <a href="javascript:void(0)" class="btn blue-btn">{{ __('file.claim_Now') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="edit-box white-box">
                    <div class="edit-icon">
                        <a href="javascript:void(0)"><i class="fa-solid fa-pencil"></i></a>
                    </div>
                    <div class="editable-content-8  mt-15">
                        <div class="row align-items-center">
                            <div class="col-lg-7">
                                <div class="about">
                                    <div class="edit-heading">
                                        <h2 style="color: #002347;">What is Asana?</h2>
                                        <p>Asana is a powerful and versatile tool for managing projects and tasks, offering a wide range of features that cater to different team sizes and industries. Its user-friendly interface, combined with flexible project views and customizable workflows, makes it an attractive option for teams looking to streamline their work and stay organized. With extensive integration options and features designed to promote collaboration and productivity, Asana helps ensure that teams can work together efficiently.</p>
                                        <p class="moretext">
                                            Brisket ball tip cow sirloin. Chuck porchetta kielbasa pork chop doner sirloin, bacon beef brisket ball tip short ribs.
                                          </p>
                                    </div>
                                    <a class="moreless-button" href="javascript:void(0)">Read more</a>
                                </div>
                                <div class="integrations">
                                    <h4>Asana Integrations</h4>
                                    <ul>
                                        <li><img src="{{asset('vender_dashboard/img/int1.svg')}}" alt=""> Adobe Workfront</li>
                                        <li><img src="{{asset('vender_dashboard/img/int2.svg')}}" alt=""> Confluence</li>
                                        <li><img src="{{asset('vender_dashboard/img/int3.svg')}}" alt=""> Sage Intacct</li>
                                        <li><img src="{{asset('vender_dashboard/img/int4.svg')}}" alt=""> ThriveCart</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="slider-videos_nav">
                                    <div class="slider-for">
                                       <div class="for-child">
                                        <div class="play-button"></div>
                                        <video width="100%" height="300px" controls>
                                            <source src="{{asset('vender_dashboard/video/slidervideo.mp4')}}" type="video/mp4">
                                            Your browser does not support the video tag.
                                        </video>

                                       </div>
                                       <div class="for-child">
                                        <div class="play-button"></div>
                                        <video width="100%" height="300px" controls>
                                            <source src="{{asset('vender_dashboard/video/slidervideo.mp4')}}" type="video/mp4">
                                            Your browser does not support the video tag.
                                        </video>

                                       </div>
                                       <div class="for-child">
                                        <div class="play-button"></div>
                                        <video width="100%" height="300px" controls>
                                            <source src="{{asset('vender_dashboard/video/slidervideo.mp4')}}" type="video/mp4">
                                            Your browser does not support the video tag.
                                        </video>

                                       </div>
                                       <div class="for-child">
                                        <div class="play-button"></div>
                                        <video width="100%" height="300px" controls>
                                            <source src="{{asset('vender_dashboard/video/slidervideo.mp4')}}" type="video/mp4">
                                            Your browser does not support the video tag.
                                        </video>

                                       </div>
                                       <div class="for-child">
                                        <div class="play-button"></div>
                                        <video width="100%" height="300px" controls>
                                            <source src="{{asset('vender_dashboard/video/slidervideo.mp4')}}" type="video/mp4">
                                            Your browser does not support the video tag.
                                        </video>

                                       </div>

                                    </div>
                                    <div class="slider-nav">

                                        <div class="nav-child"><img src="{{asset('vender_dashboard/img/childslider.png')}}" alt=""></div>
                                        <div class="nav-child"><img src="{{asset('vender_dashboard/img/childslider.png')}}" alt=""></div>
                                        <div class="nav-child"><img src="{{asset('vender_dashboard/img/childslider.png')}}" alt=""></div>
                                        <div class="nav-child"><img src="{{asset('vender_dashboard/img/childslider.png')}}" alt=""></div>
                                        <div class="nav-child"><img src="{{asset('vender_dashboard/img/slider-nav-child1.png')}}" alt=""></div>
                                        <div class="nav-child"><img src="{{asset('vender_dashboard/img/childslider.png')}}" alt=""></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="edit-box">
                    <div class="edit-icon">
                        <a href="javascript:void(0)"><i class="fa-solid fa-pencil"></i></a>
                    </div>
                    <div class="editable-content-2 editable-content-3 editable-content-l9 mt-15">
                        <div class="features">
                            <div class="feature-box">
                                <h4>{{ __('file.typical_customer') }}</h4>
                                <ul>
                                    <li>Freelancers</li>
                                    <li>Small businesses</li>
                                    <li>Mid size businesses</li>
                                    <li>Large enterprises</li>
                                </ul>
                            </div>
                            <div class="feature-box">
                                <h4>{{ __('file.Platforms_supported') }}</h4>
                                <ul>
                                    <li>Web</li>
                                    <li>Android</li>
                                    <li>iPhone/iPad</li>
                                </ul>
                            </div>
                            <div class="feature-box">
                                <h4>{{ __('file.support_Option') }}</h4>
                                <ul>
                                    <li>Phone Support</li>
                                    <li>Email/Help Desk</li>
                                    <li>Chat</li>
                                    <li>24/7 (Live rep)</li>
                                    <li>FAQs/Forum</li>
                                    <li>Knowledge Base</li>
                                </ul>
                            </div>
                            <div class="feature-box">
                                <h4>{{ __('file.training_option') }}</h4>
                                <ul>
                                    <li>Videos</li>
                                    <li>Webinars</li>
                                    <li>Chat</li>
                                    <li>In Person</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="edit-box blue-edit-box">
                    <div class="edit-icon">
                        <a href="javascript:void(0)"><i class="fa-solid fa-pencil"></i></a>
                    </div>
                    <div class="editable-content-4 mt-15">
                        <div class="features">
                            <div class="feature-box">
                                <h4>{{ __('file.Location') }}</h4>
                                <p>New York </p>
                            </div>
                            <div class="feature-box">
                                <h4>{{ __('file.year_founded') }}</h4>
                                <p>2020</p>
                            </div>
                            <div class="feature-box">
                                <h4>{{ __('file.language_supported') }}</h4>
                                <div class="flag-box">
                                    <div class="flag">
                                        <img src="{{asset('vender_dashboard/img/flag1.png')}}" alt="">
                                    </div>
                                    <div class="flag">
                                        <img src="{{asset('vender_dashboard/img/flag2.png')}}" alt="">
                                    </div>
                                    <div class="flag">
                                        <img src="{{asset('vender_dashboard/img/flag3.png')}}" alt="">
                                    </div>
                                    <div class="flag">
                                        <img src="{{asset('vender_dashboard/img/flag4.png')}}" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="feature-box">
                                <h4>{{ __('file.support_Option') }}</h4>
                                <p>24/7 Live Chat, Email Support</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="edit-box white-box">
                    <div class="edit-icon">
                        <a href="javascript:void(0)"><i class="fa-solid fa-pencil"></i></a>
                    </div>
                    <div class="editable-content-3 editable-content-5 mt-15">
                        <div class="features">
                            <div class="feature-box">
                                <div class="pro-con-img">
                                    <img src="{{asset('vender_dashboard/img/pro.png')}}" alt="">
                                </div>
                                <h4>{{ __('file.pros') }}</h4>
                                <ul>
                                    <li>Modern user interface</li>
                                    <li>Customizable</li>
                                    <li>Offers in-app automations</li>
                                    <li>Includes templates</li>
                                </ul>
                            </div>
                            <div class="feature-box">
                                <div class="pro-con-img">
                                    <img src="{{asset('vender_dashboard/img/cons.png')}}" alt="">
                                </div>
                                <h4>{{ __('file.cons') }}</h4>
                                <ul class="cons">
                                    <li>Confusing pricing and plans</li>
                                    <li>Inconsistent and Byzantine navigation options</li>
                                    <li>Free plan isn't designed for serious business use</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="edit-box white-box mb_40">
                    <div class="edit-icon">
                        <a href="javascript:void(0)"><i class="fa-solid fa-pencil"></i></a>
                    </div>
                    <div class="editable-content-6 mt-15">
                        <div class="edit-heading">
                            <h2>Overview of Asana</h2>
                            <p>Asana is a widely recognized project management platform created to help
                                teams organize, manage, and track their tasks and workflows efficiently.
                                Launched in 2008, Asana has become a staple for businesses of various sizes,
                                offering a solution that helps teams focus on their work rather than
                                managing the coordination of it. It provides a structured way to break
                                projects into individual tasks, assign them to team members, and set
                                deadlines, with real-time tracking features to monitor progress. The
                                platform supports a wide range of industries and project types, making it
                                adaptable for different business environments.
                            </p>
                            <p>Asana acts as a central hub for project-related communication and task
                                management, which helps minimize scattered email chains and disorganized
                                file storage. Whether teams are working from an office or remotely, Asana
                                facilitates collaboration by ensuring that all work and project details
                                remain in one place. Its scalability ensures that it fits both small teams
                                managing simple workflows and large organizations handling complex projects.
                            </p>

                            <h4>Asana Integrations</h4>
                            <p>Asana is equipped with a wide range of features designed to streamline
                                project management. At its core, it allows users to create tasks within
                                projects, assign them to individuals, and set due dates. Each task can
                                include detailed descriptions, attachments, and links to related tasks,
                                ensuring all relevant information is centralized. The ability to create
                                subtasks further helps break down larger tasks into manageable components.
                            </p>

                            <p> A standout aspect of Asana is its flexibility in project visualization.
                                Users can choose from different project views depending on their preferences
                                or the needs of the task. The List View provides a linear breakdown of
                                tasks, ideal for more detail-oriented workflows. The Board View, inspired by
                                the Kanban methodology, is useful for tracking work stages, while the
                                Timeline view allows for Gantt chart-style planning, which helps project
                                managers map out dependencies and set long-term plans. The Calendar view
                                offers a simpler overview of task deadlines across a project timeline.</p>

                            <p> Asana’s custom fields feature provides another layer of personalization.
                                Teams can tailor project tracking to their needs by adding specific fields,
                                such as status updates, priority indicators, or budget information. Custom
                                fields make it easy to capture and organize data that is essential for each
                                project.</p>

                            <p> Task dependencies are another critical feature that allows users to specify
                                which tasks need to be completed before others can start. This feature is
                                particularly useful for larger projects with complex timelines.
                                Additionally, milestones within projects help track key progress points and
                                ensure that teams stay aligned on their goals.</p>

                            <p> Collaboration is at the heart of Asana’s functionality. Users can comment on
                                tasks, attach files, and tag colleagues directly within the platform,
                                ensuring that communication is contextually tied to the relevant work. Asana
                                also integrates with several popular communication tools, such as Slack and
                                Microsoft Teams, making it easier for teams to stay connected and informed
                                without switching between platforms. </p>

                            <p> Automation is an essential feature that helps teams reduce manual work.
                                Users can set rules to automate certain actions, such as moving tasks
                                between project stages, assigning tasks based on completion, or updating due
                                dates. This reduces the need for constant monitoring and ensures smoother
                                project workflows.</p>

                            <p> For managers, workload tracking is a valuable tool. Asana allows users to
                                see how tasks are distributed among team members, helping them identify
                                imbalances and adjust workloads to prevent burnout or delays in project
                                completion.</p>
                        </div>
                    </div>
                </div>
                <div class="edit-box blue-edit-box">
                    <div class="edit-icon">
                        <a href="javascript:void(0)"><i class="fa-solid fa-pencil"></i></a>
                    </div>
                    <div class="editable-content mt-15">
                        <div class="user-info">
                            <div class="user-name1">
                                <img src="{{asset('vender_dashboard/img/edit1.png')}}" alt="Asana" class="logo">
                            </div>
                            <div class="user-data">
                                <div class="user-name d-flex">
                                    <h4>Asana</h4>
                                </div>
                                <div class="rating">
                                    <div class="star-box">
                                        <span>5.0</span>
                                        <div class="star">
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                        </div>
                                        <div class="down-arrow">
                                            <i class="fa-solid fa-chevron-down"></i>
                                        </div>
                                    </div>
                                    <p>124 ratings</p>
                                </div>
                            </div>

                        </div>
                        <div class="rgt-edit-data">
                            <div class="edit-btn">
                                <a href="javascript:void(0)" class="btn unq_btn">Visit Website <img
                                        src="{{asset('vender_dashboard/img/arrowdown.png')}}" alt=""></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="edit-box white-box mb_40">
                    <div class="edit-icon">
                        <a href="javascript:void(0)"><i class="fa-solid fa-pencil"></i></a>
                    </div>
                    <div class="editable-content-6 mt-15">
                        <div class="edit-heading">
                            <h4>Usability and Experience</h4>
                            <p>Asana is well-known for its user-friendly interface. The platform’s layout is
                                intuitive, with a clean design that allows users to easily navigate through
                                projects and tasks. New users can quickly familiarize themselves with the
                                system, making onboarding for teams fast and efficient.</p>
                            <p>The platform's drag-and-drop functionality makes it easy to manage tasks and
                                projects by simply rearranging items within the interface. This feature,
                                combined with the flexibility in how work is visualized, allows teams to
                                tailor their workflow according to their needs.</p>
                            <p>Another key element of Asana’s usability is its mobile application. The
                                mobile app ensures that team members can stay connected and productive while
                                on the go. It mirrors much of the functionality available on the desktop
                                version, allowing users to create tasks, view project updates, and
                                communicate with their teams from anywhere.</p>
                            <p>Asana’s design accommodates both individual contributors and larger teams.
                                Individual users can track personal tasks and deadlines, while teams can
                                focus on collaborative projects and work toward shared goals. This makes the
                                platform adaptable for teams with varying levels of complexity in their
                                workflows.</p>
                        </div>
                    </div>
                </div>
                <div class="edit-box orng-edit-box">
                    <div class="edit-icon">
                        <a href="javascript:void(0)"><i class="fa-solid fa-pencil"></i></a>
                    </div>
                    <div class="editable-content mt-15">
                        <div class="user-info">
                            <div class="user-name1">
                                <img src="{{asset('vender_dashboard/img/orangecheck.png')}}" alt="Asana" class="logo">
                            </div>
                            <div class="user-data">
                                <div class="user-name d-flex">
                                    <h4>Free Trial Available</h4>
                                </div>
                            </div>

                        </div>
                        <div class="rgt-edit-data">
                            <div class="edit-btn">
                                <a href="javascript:void(0)" class="btn blue-btn">Claim Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="edit-box white-box mb_40">
                    <div class="edit-icon">
                        <a href="javascript:void(0)"><i class="fa-solid fa-pencil"></i></a>
                    </div>
                    <div class="editable-content-6 mt-15">
                        <div class="edit-heading">
                            <h4>Integrations and Compatibility</h4>
                            <p>Asana’s strength lies in its ability to integrate with a wide variety of
                                third-party applications, making it a versatile tool for teams already using
                                different software in their daily operations. The platform supports
                                integrations with popular communication, file-sharing, time-tracking, and
                                project management tools.
                            </p>
                            <p>Communication is essential to any project, and Asana integrates seamlessly
                                with tools like Slack and Microsoft Teams. These integrations allow users to
                                send task updates, assign work, and share progress directly in team chats,
                                keeping everyone informed without needing to switch platforms constantly.
                            </p>
                            <p>For file management, Asana connects with services such as Google Drive,
                                Dropbox, and OneDrive. This enables users to attach relevant documents and
                                files directly to tasks, ensuring that all necessary resources are in one
                                place. The ability to share and store files within the project environment
                                makes it easier for teams to access critical information and avoid
                                miscommunication.
                            </p>
                            <p>Time tracking is another critical aspect for teams that need to monitor how
                                long tasks take or track billable hours. While Asana does not have native
                                time-tracking capabilities, it integrates with tools such as Harvest and
                                Everhour. These integrations allow users to track time spent on specific
                                tasks or projects, providing useful insights for managing project timelines
                                or calculating budgets.
                            </p>
                            <p>Asana also integrates with other project management tools like Jira and
                                Trello, making it easier for teams using multiple systems to keep everything
                                aligned in one central hub. These integrations help reduce the complexity of
                                managing large projects spread across different platforms, ensuring that all
                                workflows are synchronized and visible.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="edit-box">
                    <div class="edit-icon">
                        <a href="javascript:void(0)"><i class="fa-solid fa-pencil"></i></a>
                    </div>
                    <div class="editable-content-7 mt-15">
                        <div class="edit-heading">
                            <h2 class="text-center" style="color: #06498B;">Case Studies</h2>
                        </div>
                        <div class="case-slider">
                            <div class="case-slides">
                                    <a href="javascript:void(0)">
                                    <div class="case-img">
                                        <img src="{{asset('vender_dashboard/img/case1.png')}}" alt="">
                                    </div>
                                    <p>Localio Case Study - Lorem Ipsum</p>
                                </a>
                                </div>
                                <div class="case-slides">
                                    <a href="javascript:void(0)">
                                    <div class="case-img">
                                        <img src="{{asset('vender_dashboard/img/case2.png')}}" alt="">
                                    </div>
                                    <p>Localio Case Study - Lorem Ipsum</p>
                                </a>
                                </div>
                                <div class="case-slides">
                                    <a href="javascript:void(0)">
                                    <div class="case-img">
                                        <img src="{{asset('vender_dashboard/img/case3.png')}}" alt="">
                                    </div>
                                    <p>Localio Case Study - Lorem Ipsum</p>
                                </a>
                                </div>
                                <div class="case-slides">
                                    <a href="javascript:void(0)">
                                    <div class="case-img">
                                        <img src="{{asset('vender_dashboard/img/case1.png')}}" alt="">
                                    </div>
                                    <p>Localio Case Study - Lorem Ipsum</p>
                                </a>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
