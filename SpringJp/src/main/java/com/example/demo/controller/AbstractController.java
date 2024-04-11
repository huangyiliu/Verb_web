package com.example.demo.controller;

import org.springframework.ui.Model;

public class AbstractController {
	/**
	 * 業務コントローラ基底クラスです。
	 */		
		/**
		 * ホーム画面にリダイレクトします。
		 * @return String リダイレクト命令
		 */
		protected String redirectHome() {
			return "redirect:/home";
		}
		
		/**
		 * 画面遷移を行います。
		 * 
		 * <pre>
		 *   [business_layout]
		 * </pre>
		 * 
		 * @param model Model
		 * @param template テンプレート名
		 * @param fragment フラグメント名
		 * @return String 遷移先ファイル
		 */
		protected String forwardBusinessLayout(Model model, String template, String fragment) {
			model.addAttribute("contents", template + "::" + fragment);
			// 
			return "fragments/layout";
		}
}
