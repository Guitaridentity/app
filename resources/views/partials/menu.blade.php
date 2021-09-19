<div id="sidebar" class="c-sidebar c-sidebar-fixed c-sidebar-lg-show">

    <div class="c-sidebar-brand d-md-down-none">
        <a class="c-sidebar-brand-full h4" href="#">
            {{ trans('panel.site_title') }}
        </a>
    </div>

    <ul class="c-sidebar-nav">
        <li class="c-sidebar-nav-item">
            <a href="{{ route("admin.home") }}" class="c-sidebar-nav-link">
                <i class="c-sidebar-nav-icon fas fa-fw fa-tachometer-alt">

                </i>
                {{ trans('global.dashboard') }}
            </a>
        </li>
        @can('plan_management_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/plans*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-hand-holding-usd c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.planManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('plan_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.plans.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/plans") || request()->is("admin/plans/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.plan.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('user_management_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/permissions*") ? "c-show" : "" }} {{ request()->is("admin/roles*") ? "c-show" : "" }} {{ request()->is("admin/users*") ? "c-show" : "" }} {{ request()->is("admin/user-professions*") ? "c-show" : "" }} {{ request()->is("admin/user-addresses*") ? "c-show" : "" }} {{ request()->is("admin/user-pictures*") ? "c-show" : "" }} {{ request()->is("admin/user-videos*") ? "c-show" : "" }} {{ request()->is("admin/user-details*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-users c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.userManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('permission_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.permissions.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-unlock-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.permission.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('role_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.roles.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.role.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('user_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.users.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/users") || request()->is("admin/users/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-user c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.user.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('user_profession_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.user-professions.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/user-professions") || request()->is("admin/user-professions/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.userProfession.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('user_address_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.user-addresses.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/user-addresses") || request()->is("admin/user-addresses/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.userAddress.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('user_picture_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.user-pictures.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/user-pictures") || request()->is("admin/user-pictures/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.userPicture.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('user_video_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.user-videos.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/user-videos") || request()->is("admin/user-videos/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.userVideo.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('user_detail_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.user-details.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/user-details") || request()->is("admin/user-details/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.userDetail.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('guitars_management_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/guitar-types*") ? "c-show" : "" }} {{ request()->is("admin/guitar-brands*") ? "c-show" : "" }} {{ request()->is("admin/guitar-brand-models*") ? "c-show" : "" }} {{ request()->is("admin/guitars*") ? "c-show" : "" }} {{ request()->is("admin/guitar-hardware*") ? "c-show" : "" }} {{ request()->is("admin/guitarowners*") ? "c-show" : "" }} {{ request()->is("admin/guitar-comments*") ? "c-show" : "" }} {{ request()->is("admin/guitar-pictures*") ? "c-show" : "" }} {{ request()->is("admin/guitarvideos*") ? "c-show" : "" }} {{ request()->is("admin/guitar-likes*") ? "c-show" : "" }} {{ request()->is("admin/guitarchanges*") ? "c-show" : "" }} {{ request()->is("admin/guitar-purchaseds*") ? "c-show" : "" }} {{ request()->is("admin/guitar-purchase-wheres*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-music c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.guitarsManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('guitar_type_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.guitar-types.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/guitar-types") || request()->is("admin/guitar-types/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.guitarType.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('guitar_brand_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.guitar-brands.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/guitar-brands") || request()->is("admin/guitar-brands/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.guitarBrand.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('guitar_brand_model_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.guitar-brand-models.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/guitar-brand-models") || request()->is("admin/guitar-brand-models/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.guitarBrandModel.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('guitar_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.guitars.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/guitars") || request()->is("admin/guitars/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.guitar.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('guitar_hardware_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.guitar-hardware.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/guitar-hardware") || request()->is("admin/guitar-hardware/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.guitarHardware.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('guitarowner_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.guitarowners.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/guitarowners") || request()->is("admin/guitarowners/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.guitarowner.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('guitar_comment_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.guitar-comments.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/guitar-comments") || request()->is("admin/guitar-comments/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.guitarComment.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('guitar_picture_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.guitar-pictures.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/guitar-pictures") || request()->is("admin/guitar-pictures/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.guitarPicture.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('guitarvideo_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.guitarvideos.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/guitarvideos") || request()->is("admin/guitarvideos/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.guitarvideo.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('guitar_like_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.guitar-likes.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/guitar-likes") || request()->is("admin/guitar-likes/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.guitarLike.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('guitarchange_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.guitarchanges.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/guitarchanges") || request()->is("admin/guitarchanges/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.guitarchange.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('guitar_purchased_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.guitar-purchaseds.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/guitar-purchaseds") || request()->is("admin/guitar-purchaseds/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.guitarPurchased.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('guitar_purchase_where_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.guitar-purchase-wheres.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/guitar-purchase-wheres") || request()->is("admin/guitar-purchase-wheres/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.guitarPurchaseWhere.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('taxonomie_management_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/taxonomie-names*") ? "c-show" : "" }} {{ request()->is("admin/guitar-taxonomies*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-plug c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.taxonomieManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('taxonomie_name_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.taxonomie-names.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/taxonomie-names") || request()->is("admin/taxonomie-names/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.taxonomieName.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('guitar_taxonomy_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.guitar-taxonomies.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/guitar-taxonomies") || request()->is("admin/guitar-taxonomies/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.guitarTaxonomy.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('mothers_management_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/mothers*") ? "c-show" : "" }} {{ request()->is("admin/mother-hardware*") ? "c-show" : "" }} {{ request()->is("admin/mother-comments*") ? "c-show" : "" }} {{ request()->is("admin/mother-likes*") ? "c-show" : "" }} {{ request()->is("admin/mother-pictures*") ? "c-show" : "" }} {{ request()->is("admin/mother-videos*") ? "c-show" : "" }} {{ request()->is("admin/mother-descriptions*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-music c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.mothersManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('mother_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.mothers.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/mothers") || request()->is("admin/mothers/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.mother.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('mother_hardware_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.mother-hardware.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/mother-hardware") || request()->is("admin/mother-hardware/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.motherHardware.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('mother_comment_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.mother-comments.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/mother-comments") || request()->is("admin/mother-comments/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.motherComment.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('mother_like_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.mother-likes.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/mother-likes") || request()->is("admin/mother-likes/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.motherLike.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('mother_picture_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.mother-pictures.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/mother-pictures") || request()->is("admin/mother-pictures/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.motherPicture.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('mother_video_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.mother-videos.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/mother-videos") || request()->is("admin/mother-videos/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.motherVideo.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('mother_description_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.mother-descriptions.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/mother-descriptions") || request()->is("admin/mother-descriptions/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.motherDescription.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('country_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.countries.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/countries") || request()->is("admin/countries/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.country.title') }}
                </a>
            </li>
        @endcan
        @can('audit_log_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.audit-logs.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/audit-logs") || request()->is("admin/audit-logs/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-file-alt c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.auditLog.title') }}
                </a>
            </li>
        @endcan
        @can('user_alert_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.user-alerts.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/user-alerts") || request()->is("admin/user-alerts/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-bell c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.userAlert.title') }}
                </a>
            </li>
        @endcan
        @can('courses_management_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/courses*") ? "c-show" : "" }} {{ request()->is("admin/lessons*") ? "c-show" : "" }} {{ request()->is("admin/tests*") ? "c-show" : "" }} {{ request()->is("admin/questions*") ? "c-show" : "" }} {{ request()->is("admin/question-options*") ? "c-show" : "" }} {{ request()->is("admin/test-results*") ? "c-show" : "" }} {{ request()->is("admin/test-answers*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-music c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.coursesManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('course_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.courses.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/courses") || request()->is("admin/courses/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.course.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('lesson_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.lessons.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/lessons") || request()->is("admin/lessons/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.lesson.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('test_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.tests.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/tests") || request()->is("admin/tests/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.test.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('question_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.questions.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/questions") || request()->is("admin/questions/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.question.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('question_option_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.question-options.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/question-options") || request()->is("admin/question-options/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.questionOption.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('test_result_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.test-results.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/test-results") || request()->is("admin/test-results/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.testResult.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('test_answer_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.test-answers.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/test-answers") || request()->is("admin/test-answers/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.testAnswer.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('events_management_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/events*") ? "c-show" : "" }} {{ request()->is("admin/event-users*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-music c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.eventsManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('event_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.events.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/events") || request()->is("admin/events/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.event.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('event_user_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.event-users.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/event-users") || request()->is("admin/event-users/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.eventUser.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('testfunction_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.testfunctions.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/testfunctions") || request()->is("admin/testfunctions/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.testfunction.title') }}
                </a>
            </li>
        @endcan
        <li class="c-sidebar-nav-item">
            <a href="{{ route("admin.systemCalendar") }}" class="c-sidebar-nav-link {{ request()->is("admin/system-calendar") || request()->is("admin/system-calendar/*") ? "c-active" : "" }}">
                <i class="c-sidebar-nav-icon fa-fw fas fa-calendar">

                </i>
                {{ trans('global.systemCalendar') }}
            </a>
        </li>
        @php($unread = \App\Models\QaTopic::unreadCount())
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.messenger.index") }}" class="{{ request()->is("admin/messenger") || request()->is("admin/messenger/*") ? "c-active" : "" }} c-sidebar-nav-link">
                    <i class="c-sidebar-nav-icon fa-fw fa fa-envelope">

                    </i>
                    <span>{{ trans('global.messages') }}</span>
                    @if($unread > 0)
                        <strong>( {{ $unread }} )</strong>
                    @endif

                </a>
            </li>
            @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
                @can('profile_password_edit')
                    <li class="c-sidebar-nav-item">
                        <a class="c-sidebar-nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'c-active' : '' }}" href="{{ route('profile.password.edit') }}">
                            <i class="fa-fw fas fa-key c-sidebar-nav-icon">
                            </i>
                            {{ trans('global.change_password') }}
                        </a>
                    </li>
                @endcan
            @endif
            <li class="c-sidebar-nav-item">
                <a href="#" class="c-sidebar-nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                    <i class="c-sidebar-nav-icon fas fa-fw fa-sign-out-alt">

                    </i>
                    {{ trans('global.logout') }}
                </a>
            </li>
    </ul>

</div>