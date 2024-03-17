package com.example.demo.service;

import java.util.ArrayList;
import java.util.Arrays;
import java.util.HashMap;
import java.util.List;
import java.util.Map;

import org.springframework.stereotype.Service;

@Service
public class JpService {
	String[] i = { "出る", "見る", "寝る", "いる" }; // 假名在汉字上的二段
	String[] e = { "減る", "要る", "知る", "切る", "帰る" }; // 例外
	String[] a = { "い", "え", "き", "け", "げ", "せ", "て", "で", "ね", "へ", "べ", "み", "め", "り", "れ" }; // 上下一段判别

	private static final Map<String, List<String>> specialVerbs = new HashMap<>();
	static {
		List<String> teList = new ArrayList<>();
		teList.add("行って");
		specialVerbs.put("行く_te", teList);

		List<String> taList = new ArrayList<>();
		taList.add("行った");
		specialVerbs.put("行く_ta", taList);

		List<String> masuList = new ArrayList<>();
		masuList.add("行きます");
		specialVerbs.put("行く_masu", masuList);
	}

	public String Tomasu(String verb) {

		StringBuilder result = new StringBuilder();
		String f = verb.substring(0, verb.length() - 1); // 动词词干
		String t1 = verb.substring(verb.length() - 1); // 动词倒数第一个假名
		String t2 = verb.substring(verb.length() - 2, verb.length() - 1); // 动词倒数第二个假名

		if (t1.equals("る")) { // 動詞結尾為る
			if (verb.equals("する")) {
				result.append("し");
			} else if (verb.equals("来る")) {
				result.append("き");
			} else if (Arrays.asList(e).contains(verb)) {
				result.append(f).append("り");
			} else if (Arrays.asList(i).contains(verb)) {
				result.append(f);
			} else {
				result.append(f);
			}
		} else { // 動詞結尾不為る
			if (Arrays.asList(a).contains(t2)) { // 上下一段判別
				result.append(f); // 添加動詞語幹
			} else { // 上下一段以外的情况
				switch (t1) {
				case "う":
					result.append(f).append("い");
					break;
				case "く":
					result.append(f).append("き");
					break;
				case "ぐ":
					result.append(f).append("ぎ");
					break;
				case "す":
					result.append(f).append("し");
					break;
				case "つ":
					result.append(f).append("ち");
					break;
				case "ぬ":
					result.append(f).append("に");
					break;
				case "ぶ":
					result.append(f).append("び");
					break;
				case "む":
					result.append(f).append("み");
					break;
				default:
					result.append(f).append("り");
					break;
				}
			}
		}
		// 在最终结果上添加 "ます"
		result.append("ます");
		return result.toString();
	}

	public String Tote(String verb) {

		StringBuilder result = new StringBuilder();
		String f = verb.substring(0, verb.length() - 1); // 动词词干
		String t1 = verb.substring(verb.length() - 1); // 动词倒数第一个假名
		String t2 = verb.substring(verb.length() - 2, verb.length() - 1); // 动词倒数第二个假名

		if (t1.equals("る")) { // 動詞結尾為る
			if (verb.equals("する")) {
				result.append("して");
			} else if (verb.equals("来る")) {
				result.append("きて");
			} else if (Arrays.asList(e).contains(verb)) {// 例外
				result.append(f).append("って");
			} else if (Arrays.asList(i).contains(verb)) {// 假名在漢字上ます形
				result.append(f).append("て");
			} else {
				result.append(f).append("て");;
			}
		} else { // 動詞結尾不為る
			if (Arrays.asList(a).contains(t2)) { // 上下一段判別
				result.append(f); // 添加動詞語幹
			} else { // 上下一段以外的情况
				// 处理特殊动词情况
				List<String> specialResult = specialVerbs.get(verb + "_te");
				if (specialResult != null && !specialResult.isEmpty()) {
					result.append(specialResult.get(0)); // 取第一个结果
					return result.toString(); // 返回结果并结束方法
				} else {

					switch (t1) {
					case "う":
						result.append(f).append("って");
						break;
					case "く":
						result.append(f).append("いて");
						break;
					case "ぐ":
						result.append(f).append("いで");
						break;
					case "す":
						result.append(f).append("して");
						break;
					case "つ":
						result.append(f).append("って");
						break;
					case "ぬ":
						result.append(f).append("んで");
						break;
					case "ぶ":
						result.append(f).append("んで");
						break;
					case "む":
						result.append(f).append("んで");
						break;
					default:
						result.append(f).append("って");
						break;
					}
				}
			}
		}
		// 在最终结果上添加 "て"
		return result.toString();
	}

	public String Tota(String verb) {
		
		String f = verb.substring(0, verb.length() - 1); // 动词词干
		String t1 = verb.substring(verb.length() - 1); // 动词倒数第一个假名
		String t2 = verb.substring(verb.length() - 2, verb.length() - 1); // 动词倒数第二个假名
		StringBuilder result = new StringBuilder();
		if (t1.equals("る")) { // 動詞結尾為る
			if (verb.equals("する")) {
				result.append("した");
			} else if (verb.equals("来る")) {
				result.append("きた");
			} else if (Arrays.asList(e).contains(verb)) {// 例外
				result.append(f).append("った");
			} else if (Arrays.asList(i).contains(verb)) {// 假名在漢字上ます形
				result.append(f).append("た");
			} else {
				result.append(f).append("た");;;
			}
		} else { // 動詞結尾不為る
			if (Arrays.asList(a).contains(t2)) { // 上下一段判別
				result.append(f); // 添加動詞語幹
			} else { // 上下一段以外的情况
				// 处理特殊动词情况
				List<String> specialResult = specialVerbs.get(verb + "_ta");
				if (specialResult != null && specialResult.size() > 0) {
					result.append(specialResult.get(0)); // 取第一个结果
					return result.toString(); // 返回结果并结束方法
				} else {
					switch (t1) {
					case "う":
						result.append(f).append("った");
						break;
					case "く":
						result.append(f).append("いた");
						break;
					case "ぐ":
						result.append(f).append("いだ");
						break;
					case "す":
						result.append(f).append("した");
						break;
					case "つ":
						result.append(f).append("った");
						break;
					case "ぬ":
						result.append(f).append("んだ");
						break;
					case "ぶ":
						result.append(f).append("んだ");
						break;
					case "む":
						result.append(f).append("んだ");
						break;
					default:
						result.append(f).append("った");
						break;
					}
				}
			}
		}
		// 在最终结果上添加 "た"
		return result.toString();
	}
	
	public String Tonai(String verb) {

		StringBuilder result = new StringBuilder();
		String f = verb.substring(0, verb.length() - 1); // 动词词干
		String t1 = verb.substring(verb.length() - 1); // 动词倒数第一个假名
		String t2 = verb.substring(verb.length() - 2, verb.length() - 1); // 动词倒数第二个假名

		if (t1.equals("る")) { // 動詞結尾為る
			if (verb.equals("する")) {
				result.append("し");
			} else if (verb.equals("来る")) {
				result.append("こ");
			} else if (Arrays.asList(e).contains(verb)) {
				result.append(f).append("ら");
			} else if (Arrays.asList(i).contains(verb)) {
				result.append(f);
			} else {
				result.append(f);
			}
		} else { // 動詞結尾不為る
			if (Arrays.asList(a).contains(t2)) { // 上下一段判別
				result.append(f); // 添加動詞語幹
			} else { // 上下一段以外的情况
				switch (t1) {
				case "う":
					result.append(f).append("わ");
					break;
				case "く":
					result.append(f).append("か");
					break;
				case "ぐ":
					result.append(f).append("が");
					break;
				case "す":
					result.append(f).append("さ");
					break;
				case "つ":
					result.append(f).append("た");
					break;
				case "ぬ":
					result.append(f).append("な");
					break;
				case "ぶ":
					result.append(f).append("ば");
					break;
				case "む":
					result.append(f).append("ま");
					break;
				default:
					result.append(f).append("ら");
					break;
				}
			}
		}
		// 在最终结果上添加 "ます"
		result.append("ない");
		return result.toString();
	}
}
