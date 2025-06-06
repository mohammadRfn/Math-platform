<?php

namespace Database\Seeders;

use App\Models\Challange;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChallangeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $challenges = [
            [
                'title' => 'آشنایی با اعداد صحیح',
                'description' => 'در این چالش شما باید با اعداد صحیح آشنا شوید و توانایی جمع و تفریق آنها را پیدا کنید و عملیات های مختلف شمارا به چالش خواهند کشید.',
                'points' => 1,
                'tenant_id' => 1,
            ],
            [
                'title' => 'حل معادلات ساده خطی',
                'description' => 'در این چالش شما باید معادلات ساده خطی را حل کنید و توانایی تحلیل و حل مسائل ریاضی را تقویت کنید.',
                'points' => 5,
                'tenant_id' => 1,
            ],
            [
                'title' => 'آشنایی با اعداد گویا و اعشاری',
                'description' => 'در این چالش شما باید با اعداد گویا و اعشاری آشنا شوید و توانایی تبدیل آنها به یکدیگر را پیدا کنید.',
                'points' => 5,
                'tenant_id' => 1,
            ],
            [
                'title' => 'مفاهیم پایه هندسه (شکل‌ها و زاویه‌ها)',
                'description' => 'در این چالش شما باید با مفاهیم پایه هندسه آشنا شوید و توانایی تشخیص و ترسیم اشکال هندسی و زاویه‌ها را پیدا کنید.',
                'points' => 5,
                'tenant_id' => 1,
            ],
            [
                'title' => 'معادلات درجه دوم و کاربردها-توابع خطی و درجه دوم',
                'description' => 'در این چالش شما باید با معادلات درجه دوم و توابع خطی و درجه دوم آشنا شوید و توانایی تحلیل و حل مسائل مرتبط با آنها را پیدا کنید.',
                'points' => 10,
                'tenant_id' => 1,
            ],
            [
                'title' => 'مثلثات مقدماتی (سینوس، کسینوس و تانژانت)-حل مسائل ترکیبیات ساده',
                'description' => 'در این چالش شما باید با مثلثات مقدماتی آشنا شوید و توانایی حل مسائل ترکیبیات ساده را پیدا کنید.',
                'points' => 10,
                'tenant_id' => 1,
            ],
            [
                'title' => 'مفاهیم اولیه آمار و احتمال',
                'description' => 'در این چالش شما باید با مفاهیم اولیه آمار و احتمال آشنا شوید و توانایی تحلیل داده‌ها و محاسبه احتمال رویدادها را پیدا کنید.',
                'points' => 20,
                'tenant_id' => 1,
            ],
            [
                'title' => 'حل معادلات دیفرانسیل ساده-توابع مثلثاتی پیچیده',
                'description' => 'در این چالش شما باید با حل معادلات دیفرانسیل ساده و توابع مثلثاتی پیچیده آشنا شوید و توانایی تحلیل و حل مسائل مرتبط با آنها را پیدا کنید.',
                'points' => 35,
                'tenant_id' => 1,
            ],
            [
                'title' => 'تحلیل بردارها و ماتریس‌ها-مسائل هندسه تحلیلی',
                'description' => 'در این چالش شما باید با تحلیل بردارها و ماتریس‌ها آشنا شوید و توانایی حل مسائل هندسه تحلیلی را پیدا کنید.',
                'points' => 35,
                'tenant_id' => 1,
            ],
            [
                'title' => 'معماهای ریاضی ترکیبی',
                'description' => 'در این چالش شما باید با معماهای ریاضی ترکیبی آشنا شوید و توانایی حل مسائل پیچیده و ترکیبی را پیدا کنید.',
                'points' => 50,
                'tenant_id' => 1,
            ],
            [
                'title' => 'حل مسائل چندمرحله‌ای با استدلال‌های پیچیده',
                'description' => 'در این چالش شما باید با حل مسائل چندمرحله‌ای با استدلال‌های پیچیده آشنا شوید و توانایی تحلیل و حل مسائل پیچیده را پیدا کنید.',
                'points' => 60,
                'tenant_id' => 1,
            ],
            [
                'title' => 'مسائل مسابقات ریاضی و المپیادها',
                'description' => 'در این چالش شما باید با مسائل مسابقات ریاضی و المپیادها آشنا شوید و توانایی حل مسائل پیچیده و چالش‌برانگیز را پیدا کنید.',
                'points' => 100,
                'tenant_id' => 1,
            ],
        ];

        foreach ($challenges as $challenge) {
            Challange::create($challenge);
        }
    }
}
