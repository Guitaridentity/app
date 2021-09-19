<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 18,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 19,
                'title' => 'user_profession_create',
            ],
            [
                'id'    => 20,
                'title' => 'user_profession_edit',
            ],
            [
                'id'    => 21,
                'title' => 'user_profession_show',
            ],
            [
                'id'    => 22,
                'title' => 'user_profession_delete',
            ],
            [
                'id'    => 23,
                'title' => 'user_profession_access',
            ],
            [
                'id'    => 24,
                'title' => 'user_address_create',
            ],
            [
                'id'    => 25,
                'title' => 'user_address_edit',
            ],
            [
                'id'    => 26,
                'title' => 'user_address_show',
            ],
            [
                'id'    => 27,
                'title' => 'user_address_delete',
            ],
            [
                'id'    => 28,
                'title' => 'user_address_access',
            ],
            [
                'id'    => 29,
                'title' => 'user_picture_create',
            ],
            [
                'id'    => 30,
                'title' => 'user_picture_edit',
            ],
            [
                'id'    => 31,
                'title' => 'user_picture_show',
            ],
            [
                'id'    => 32,
                'title' => 'user_picture_delete',
            ],
            [
                'id'    => 33,
                'title' => 'user_picture_access',
            ],
            [
                'id'    => 34,
                'title' => 'user_video_create',
            ],
            [
                'id'    => 35,
                'title' => 'user_video_edit',
            ],
            [
                'id'    => 36,
                'title' => 'user_video_show',
            ],
            [
                'id'    => 37,
                'title' => 'user_video_delete',
            ],
            [
                'id'    => 38,
                'title' => 'user_video_access',
            ],
            [
                'id'    => 39,
                'title' => 'plan_management_access',
            ],
            [
                'id'    => 40,
                'title' => 'plan_create',
            ],
            [
                'id'    => 41,
                'title' => 'plan_edit',
            ],
            [
                'id'    => 42,
                'title' => 'plan_show',
            ],
            [
                'id'    => 43,
                'title' => 'plan_delete',
            ],
            [
                'id'    => 44,
                'title' => 'plan_access',
            ],
            [
                'id'    => 45,
                'title' => 'user_detail_create',
            ],
            [
                'id'    => 46,
                'title' => 'user_detail_edit',
            ],
            [
                'id'    => 47,
                'title' => 'user_detail_show',
            ],
            [
                'id'    => 48,
                'title' => 'user_detail_delete',
            ],
            [
                'id'    => 49,
                'title' => 'user_detail_access',
            ],
            [
                'id'    => 50,
                'title' => 'guitars_management_access',
            ],
            [
                'id'    => 51,
                'title' => 'guitar_type_create',
            ],
            [
                'id'    => 52,
                'title' => 'guitar_type_edit',
            ],
            [
                'id'    => 53,
                'title' => 'guitar_type_show',
            ],
            [
                'id'    => 54,
                'title' => 'guitar_type_delete',
            ],
            [
                'id'    => 55,
                'title' => 'guitar_type_access',
            ],
            [
                'id'    => 56,
                'title' => 'guitar_brand_create',
            ],
            [
                'id'    => 57,
                'title' => 'guitar_brand_edit',
            ],
            [
                'id'    => 58,
                'title' => 'guitar_brand_show',
            ],
            [
                'id'    => 59,
                'title' => 'guitar_brand_delete',
            ],
            [
                'id'    => 60,
                'title' => 'guitar_brand_access',
            ],
            [
                'id'    => 61,
                'title' => 'guitar_brand_model_create',
            ],
            [
                'id'    => 62,
                'title' => 'guitar_brand_model_edit',
            ],
            [
                'id'    => 63,
                'title' => 'guitar_brand_model_show',
            ],
            [
                'id'    => 64,
                'title' => 'guitar_brand_model_delete',
            ],
            [
                'id'    => 65,
                'title' => 'guitar_brand_model_access',
            ],
            [
                'id'    => 66,
                'title' => 'taxonomie_management_access',
            ],
            [
                'id'    => 67,
                'title' => 'taxonomie_name_create',
            ],
            [
                'id'    => 68,
                'title' => 'taxonomie_name_edit',
            ],
            [
                'id'    => 69,
                'title' => 'taxonomie_name_show',
            ],
            [
                'id'    => 70,
                'title' => 'taxonomie_name_delete',
            ],
            [
                'id'    => 71,
                'title' => 'taxonomie_name_access',
            ],
            [
                'id'    => 72,
                'title' => 'guitar_taxonomy_create',
            ],
            [
                'id'    => 73,
                'title' => 'guitar_taxonomy_edit',
            ],
            [
                'id'    => 74,
                'title' => 'guitar_taxonomy_show',
            ],
            [
                'id'    => 75,
                'title' => 'guitar_taxonomy_delete',
            ],
            [
                'id'    => 76,
                'title' => 'guitar_taxonomy_access',
            ],
            [
                'id'    => 77,
                'title' => 'guitarowner_create',
            ],
            [
                'id'    => 78,
                'title' => 'guitarowner_edit',
            ],
            [
                'id'    => 79,
                'title' => 'guitarowner_show',
            ],
            [
                'id'    => 80,
                'title' => 'guitarowner_delete',
            ],
            [
                'id'    => 81,
                'title' => 'guitarowner_access',
            ],
            [
                'id'    => 82,
                'title' => 'guitar_create',
            ],
            [
                'id'    => 83,
                'title' => 'guitar_edit',
            ],
            [
                'id'    => 84,
                'title' => 'guitar_show',
            ],
            [
                'id'    => 85,
                'title' => 'guitar_delete',
            ],
            [
                'id'    => 86,
                'title' => 'guitar_access',
            ],
            [
                'id'    => 87,
                'title' => 'country_create',
            ],
            [
                'id'    => 88,
                'title' => 'country_edit',
            ],
            [
                'id'    => 89,
                'title' => 'country_show',
            ],
            [
                'id'    => 90,
                'title' => 'country_delete',
            ],
            [
                'id'    => 91,
                'title' => 'country_access',
            ],
            [
                'id'    => 92,
                'title' => 'guitar_hardware_create',
            ],
            [
                'id'    => 93,
                'title' => 'guitar_hardware_edit',
            ],
            [
                'id'    => 94,
                'title' => 'guitar_hardware_show',
            ],
            [
                'id'    => 95,
                'title' => 'guitar_hardware_delete',
            ],
            [
                'id'    => 96,
                'title' => 'guitar_hardware_access',
            ],
            [
                'id'    => 97,
                'title' => 'guitar_comment_create',
            ],
            [
                'id'    => 98,
                'title' => 'guitar_comment_edit',
            ],
            [
                'id'    => 99,
                'title' => 'guitar_comment_show',
            ],
            [
                'id'    => 100,
                'title' => 'guitar_comment_delete',
            ],
            [
                'id'    => 101,
                'title' => 'guitar_comment_access',
            ],
            [
                'id'    => 102,
                'title' => 'guitar_picture_create',
            ],
            [
                'id'    => 103,
                'title' => 'guitar_picture_edit',
            ],
            [
                'id'    => 104,
                'title' => 'guitar_picture_show',
            ],
            [
                'id'    => 105,
                'title' => 'guitar_picture_delete',
            ],
            [
                'id'    => 106,
                'title' => 'guitar_picture_access',
            ],
            [
                'id'    => 107,
                'title' => 'guitarvideo_create',
            ],
            [
                'id'    => 108,
                'title' => 'guitarvideo_edit',
            ],
            [
                'id'    => 109,
                'title' => 'guitarvideo_show',
            ],
            [
                'id'    => 110,
                'title' => 'guitarvideo_delete',
            ],
            [
                'id'    => 111,
                'title' => 'guitarvideo_access',
            ],
            [
                'id'    => 112,
                'title' => 'guitar_like_create',
            ],
            [
                'id'    => 113,
                'title' => 'guitar_like_edit',
            ],
            [
                'id'    => 114,
                'title' => 'guitar_like_show',
            ],
            [
                'id'    => 115,
                'title' => 'guitar_like_delete',
            ],
            [
                'id'    => 116,
                'title' => 'guitar_like_access',
            ],
            [
                'id'    => 117,
                'title' => 'guitarchange_create',
            ],
            [
                'id'    => 118,
                'title' => 'guitarchange_edit',
            ],
            [
                'id'    => 119,
                'title' => 'guitarchange_show',
            ],
            [
                'id'    => 120,
                'title' => 'guitarchange_delete',
            ],
            [
                'id'    => 121,
                'title' => 'guitarchange_access',
            ],
            [
                'id'    => 122,
                'title' => 'guitar_purchased_create',
            ],
            [
                'id'    => 123,
                'title' => 'guitar_purchased_edit',
            ],
            [
                'id'    => 124,
                'title' => 'guitar_purchased_show',
            ],
            [
                'id'    => 125,
                'title' => 'guitar_purchased_delete',
            ],
            [
                'id'    => 126,
                'title' => 'guitar_purchased_access',
            ],
            [
                'id'    => 127,
                'title' => 'guitar_purchase_where_create',
            ],
            [
                'id'    => 128,
                'title' => 'guitar_purchase_where_edit',
            ],
            [
                'id'    => 129,
                'title' => 'guitar_purchase_where_show',
            ],
            [
                'id'    => 130,
                'title' => 'guitar_purchase_where_delete',
            ],
            [
                'id'    => 131,
                'title' => 'guitar_purchase_where_access',
            ],
            [
                'id'    => 132,
                'title' => 'mothers_management_access',
            ],
            [
                'id'    => 133,
                'title' => 'mother_create',
            ],
            [
                'id'    => 134,
                'title' => 'mother_edit',
            ],
            [
                'id'    => 135,
                'title' => 'mother_show',
            ],
            [
                'id'    => 136,
                'title' => 'mother_delete',
            ],
            [
                'id'    => 137,
                'title' => 'mother_access',
            ],
            [
                'id'    => 138,
                'title' => 'mother_hardware_create',
            ],
            [
                'id'    => 139,
                'title' => 'mother_hardware_edit',
            ],
            [
                'id'    => 140,
                'title' => 'mother_hardware_show',
            ],
            [
                'id'    => 141,
                'title' => 'mother_hardware_delete',
            ],
            [
                'id'    => 142,
                'title' => 'mother_hardware_access',
            ],
            [
                'id'    => 143,
                'title' => 'mother_comment_create',
            ],
            [
                'id'    => 144,
                'title' => 'mother_comment_edit',
            ],
            [
                'id'    => 145,
                'title' => 'mother_comment_show',
            ],
            [
                'id'    => 146,
                'title' => 'mother_comment_delete',
            ],
            [
                'id'    => 147,
                'title' => 'mother_comment_access',
            ],
            [
                'id'    => 148,
                'title' => 'mother_like_create',
            ],
            [
                'id'    => 149,
                'title' => 'mother_like_edit',
            ],
            [
                'id'    => 150,
                'title' => 'mother_like_show',
            ],
            [
                'id'    => 151,
                'title' => 'mother_like_delete',
            ],
            [
                'id'    => 152,
                'title' => 'mother_like_access',
            ],
            [
                'id'    => 153,
                'title' => 'mother_picture_create',
            ],
            [
                'id'    => 154,
                'title' => 'mother_picture_edit',
            ],
            [
                'id'    => 155,
                'title' => 'mother_picture_show',
            ],
            [
                'id'    => 156,
                'title' => 'mother_picture_delete',
            ],
            [
                'id'    => 157,
                'title' => 'mother_picture_access',
            ],
            [
                'id'    => 158,
                'title' => 'mother_video_create',
            ],
            [
                'id'    => 159,
                'title' => 'mother_video_edit',
            ],
            [
                'id'    => 160,
                'title' => 'mother_video_show',
            ],
            [
                'id'    => 161,
                'title' => 'mother_video_delete',
            ],
            [
                'id'    => 162,
                'title' => 'mother_video_access',
            ],
            [
                'id'    => 163,
                'title' => 'mother_description_create',
            ],
            [
                'id'    => 164,
                'title' => 'mother_description_edit',
            ],
            [
                'id'    => 165,
                'title' => 'mother_description_show',
            ],
            [
                'id'    => 166,
                'title' => 'mother_description_delete',
            ],
            [
                'id'    => 167,
                'title' => 'mother_description_access',
            ],
            [
                'id'    => 168,
                'title' => 'user_alert_create',
            ],
            [
                'id'    => 169,
                'title' => 'user_alert_show',
            ],
            [
                'id'    => 170,
                'title' => 'user_alert_delete',
            ],
            [
                'id'    => 171,
                'title' => 'user_alert_access',
            ],
            [
                'id'    => 172,
                'title' => 'course_create',
            ],
            [
                'id'    => 173,
                'title' => 'course_edit',
            ],
            [
                'id'    => 174,
                'title' => 'course_show',
            ],
            [
                'id'    => 175,
                'title' => 'course_delete',
            ],
            [
                'id'    => 176,
                'title' => 'course_access',
            ],
            [
                'id'    => 177,
                'title' => 'lesson_create',
            ],
            [
                'id'    => 178,
                'title' => 'lesson_edit',
            ],
            [
                'id'    => 179,
                'title' => 'lesson_show',
            ],
            [
                'id'    => 180,
                'title' => 'lesson_delete',
            ],
            [
                'id'    => 181,
                'title' => 'lesson_access',
            ],
            [
                'id'    => 182,
                'title' => 'test_create',
            ],
            [
                'id'    => 183,
                'title' => 'test_edit',
            ],
            [
                'id'    => 184,
                'title' => 'test_show',
            ],
            [
                'id'    => 185,
                'title' => 'test_delete',
            ],
            [
                'id'    => 186,
                'title' => 'test_access',
            ],
            [
                'id'    => 187,
                'title' => 'question_create',
            ],
            [
                'id'    => 188,
                'title' => 'question_edit',
            ],
            [
                'id'    => 189,
                'title' => 'question_show',
            ],
            [
                'id'    => 190,
                'title' => 'question_delete',
            ],
            [
                'id'    => 191,
                'title' => 'question_access',
            ],
            [
                'id'    => 192,
                'title' => 'question_option_create',
            ],
            [
                'id'    => 193,
                'title' => 'question_option_edit',
            ],
            [
                'id'    => 194,
                'title' => 'question_option_show',
            ],
            [
                'id'    => 195,
                'title' => 'question_option_delete',
            ],
            [
                'id'    => 196,
                'title' => 'question_option_access',
            ],
            [
                'id'    => 197,
                'title' => 'test_result_create',
            ],
            [
                'id'    => 198,
                'title' => 'test_result_edit',
            ],
            [
                'id'    => 199,
                'title' => 'test_result_show',
            ],
            [
                'id'    => 200,
                'title' => 'test_result_delete',
            ],
            [
                'id'    => 201,
                'title' => 'test_result_access',
            ],
            [
                'id'    => 202,
                'title' => 'test_answer_create',
            ],
            [
                'id'    => 203,
                'title' => 'test_answer_edit',
            ],
            [
                'id'    => 204,
                'title' => 'test_answer_show',
            ],
            [
                'id'    => 205,
                'title' => 'test_answer_delete',
            ],
            [
                'id'    => 206,
                'title' => 'test_answer_access',
            ],
            [
                'id'    => 207,
                'title' => 'courses_management_access',
            ],
            [
                'id'    => 208,
                'title' => 'events_management_access',
            ],
            [
                'id'    => 209,
                'title' => 'event_create',
            ],
            [
                'id'    => 210,
                'title' => 'event_edit',
            ],
            [
                'id'    => 211,
                'title' => 'event_show',
            ],
            [
                'id'    => 212,
                'title' => 'event_delete',
            ],
            [
                'id'    => 213,
                'title' => 'event_access',
            ],
            [
                'id'    => 214,
                'title' => 'event_user_create',
            ],
            [
                'id'    => 215,
                'title' => 'event_user_edit',
            ],
            [
                'id'    => 216,
                'title' => 'event_user_show',
            ],
            [
                'id'    => 217,
                'title' => 'event_user_delete',
            ],
            [
                'id'    => 218,
                'title' => 'event_user_access',
            ],
            [
                'id'    => 219,
                'title' => 'testfunction_create',
            ],
            [
                'id'    => 220,
                'title' => 'testfunction_edit',
            ],
            [
                'id'    => 221,
                'title' => 'testfunction_show',
            ],
            [
                'id'    => 222,
                'title' => 'testfunction_delete',
            ],
            [
                'id'    => 223,
                'title' => 'testfunction_access',
            ],
            [
                'id'    => 224,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
