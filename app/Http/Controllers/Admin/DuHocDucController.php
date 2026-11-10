<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\DuHocDucService;
use App\Traits\HasMessagebox;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DuHocDucController extends Controller
{
    use HasMessagebox;

    /**
     * Display the single management screen for Du Học Đức
     */
    public function index()
    {
        $settings = DuHocDucService::getSettings();
        return view('admin.du-hoc-duc.index', compact('settings'));
    }

    /**
     * Update the Du Học Đức page settings
     */
    public function update(Request $request)
    {
        $current = DuHocDucService::getSettings();
        $data = [];

        // General & Hero
        $data['meta_title'] = $request->input('meta_title', $current['meta_title']);
        $data['meta_description'] = $request->input('meta_description', $current['meta_description']);
        $data['page_title'] = $request->input('page_title', $current['page_title']);

        // About Section
        $data['about_title'] = $request->input('about_title', $current['about_title']);
        $data['about_content_1'] = $request->input('about_content_1', $current['about_content_1']);
        $data['about_content_2'] = $request->input('about_content_2', $current['about_content_2']);
        $data['about_btn_text'] = $request->input('about_btn_text', $current['about_btn_text']);
        $data['about_btn_link'] = $request->input('about_btn_link', $current['about_btn_link']);

        // Values Section (Dynamic Array)
        $data['values_title'] = $request->input('values_title', $current['values_title']);
        $rawValues = $request->input('values_items', []);
        $data['values_items'] = array_values(array_filter(array_map('trim', (array)$rawValues)));

        // Conditions Section (Dynamic Array)
        $data['conditions_title'] = $request->input('conditions_title', $current['conditions_title']);
        $rawConditions = $request->input('conditions_items', []);
        $data['conditions_items'] = array_values(array_filter(array_map('trim', (array)$rawConditions)));

        // Roadmap
        $data['roadmap_title'] = $request->input('roadmap_title', $current['roadmap_title']);

        // Blog / Knowledge Section (Dynamic Articles)
        $data['blog_title'] = $request->input('blog_title', $current['blog_title']);
        $rawArticles = $request->input('blog_articles', []);
        $articles = [];
        if (is_array($rawArticles)) {
            foreach ($rawArticles as $idx => $art) {
                if (is_array($art) && !empty($art['title'])) {
                    $fallbackImg = is_array($current['blog_articles'][$idx] ?? null)
                        ? ($current['blog_articles'][$idx]['image'] ?? 'images/du-hoc-duc/blog_berlin.png')
                        : 'images/du-hoc-duc/blog_berlin.png';
                    $artImg = !empty($art['image']) ? $art['image'] : $fallbackImg;
                    // Check if new article image was uploaded
                    if ($request->hasFile("blog_articles.{$idx}.new_image")) {
                        $file = $request->file("blog_articles.{$idx}.new_image");
                        $name = 'article_' . time() . '_' . $idx . '.' . $file->getClientOriginalExtension();
                        $file->move(public_path('images/du-hoc-duc'), $name);
                        $artImg = 'images/du-hoc-duc/' . $name;
                    }
                    $articles[] = [
                        'title' => trim((string) $art['title']),
                        'date' => trim((string) ($art['date'] ?? date('d/m/Y'))),
                        'summary' => trim((string) ($art['summary'] ?? '')),
                        'image' => $artImg,
                        'link' => trim((string) ($art['link'] ?? '#form-dang-ky')) ?: '#form-dang-ky',
                    ];
                }
            }
        }
        $data['blog_articles'] = $articles;

        // Nursing Program Section (Điều dưỡng)
        $data['nursing_title'] = $request->input('nursing_title', $current['nursing_title']);
        $data['nursing_subtitle'] = $request->input('nursing_subtitle', $current['nursing_subtitle']);
        $data['nursing_sec1_title'] = $request->input('nursing_sec1_title', $current['nursing_sec1_title']);
        $data['nursing_majors'] = $request->input('nursing_majors', $current['nursing_majors']);
        $data['nursing_duration'] = $request->input('nursing_duration', $current['nursing_duration']);
        $data['nursing_overtime'] = $request->input('nursing_overtime', $current['nursing_overtime']);

        $data['nursing_sec2_title'] = $request->input('nursing_sec2_title', $current['nursing_sec2_title']);
        $data['nursing_work_care'] = $request->input('nursing_work_care', $current['nursing_work_care']);
        $data['nursing_work_manage'] = $request->input('nursing_work_manage', $current['nursing_work_manage']);

        $data['nursing_sec3_title'] = $request->input('nursing_sec3_title', $current['nursing_sec3_title']);
        $data['nursing_cond_age'] = $request->input('nursing_cond_age', $current['nursing_cond_age']);
        $data['nursing_cond_lang'] = $request->input('nursing_cond_lang', $current['nursing_cond_lang']);
        $data['nursing_cond_health'] = $request->input('nursing_cond_health', $current['nursing_cond_health']);
        $data['nursing_cond_contract'] = $request->input('nursing_cond_contract', $current['nursing_cond_contract']);

        $data['nursing_sec4_title'] = $request->input('nursing_sec4_title', $current['nursing_sec4_title']);
        $data['nursing_tuition'] = $request->input('nursing_tuition', $current['nursing_tuition']);
        $data['nursing_allowance'] = $request->input('nursing_allowance', $current['nursing_allowance']);
        $data['nursing_salary'] = $request->input('nursing_salary', $current['nursing_salary']);
        $data['nursing_salary_vnd'] = $request->input('nursing_salary_vnd', $current['nursing_salary_vnd']);
        $data['nursing_settlement'] = $request->input('nursing_settlement', $current['nursing_settlement']);
        $data['nursing_settlement_note'] = $request->input('nursing_settlement_note', $current['nursing_settlement_note']);
        $data['nursing_benefits_other'] = $request->input('nursing_benefits_other', $current['nursing_benefits_other']);

        $data['nursing_sec5_title'] = $request->input('nursing_sec5_title', $current['nursing_sec5_title']);
        $rawAdv = $request->input('nursing_advantages', []);
        $data['nursing_advantages'] = array_values(array_filter(array_map('trim', (array)$rawAdv)));

        $rawChal = $request->input('nursing_challenges', []);
        $data['nursing_challenges'] = array_values(array_filter(array_map('trim', (array)$rawChal)));

        // Handle Image Uploads
        $uploadDir = public_path('images/du-hoc-duc');
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }

        if ($request->hasFile('banner_image')) {
            $file = $request->file('banner_image');
            $name = 'banner_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move($uploadDir, $name);
            $data['banner_image'] = 'images/du-hoc-duc/' . $name;
        } else {
            $data['banner_image'] = $current['banner_image'];
        }

        if ($request->hasFile('about_image')) {
            $file = $request->file('about_image');
            $name = 'about_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move($uploadDir, $name);
            $data['about_image'] = 'images/du-hoc-duc/' . $name;
        } else {
            $data['about_image'] = $current['about_image'];
        }

        if ($request->hasFile('roadmap_image')) {
            $file = $request->file('roadmap_image');
            $name = 'roadmap_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move($uploadDir, $name);
            $data['roadmap_image'] = 'images/du-hoc-duc/' . $name;
        } else {
            $data['roadmap_image'] = $current['roadmap_image'];
        }

        if ($request->hasFile('nursing_banner_image')) {
            $file = $request->file('nursing_banner_image');
            $name = 'nursing_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move($uploadDir, $name);
            $data['nursing_banner_image'] = 'images/du-hoc-duc/' . $name;
        } else {
            $data['nursing_banner_image'] = $current['nursing_banner_image'];
        }

        // Save everything
        DuHocDucService::saveSettings($data);

        return back()->with('success', 'Nội dung trang Du Học Đức đã được cập nhật thành công!');
    }

    /**
     * Reset Du Học Đức content to defaults
     */
    public function reset()
    {
        DuHocDucService::resetToDefaults();
        return back()->with('success', 'Đã khôi phục toàn bộ nội dung mặc định của Du Học Đức thành công!');
    }
}

