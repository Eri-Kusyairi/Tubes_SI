<!DOCTYPE html>
<html>
<head>
	<title>Soal Multiple Choice</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<script>
		// inisialisasi variable untuk menyimpan jawaban benar, jawaban pengguna, dan poin
		let correctAnswers = ["a", "a"]; // jawaban benar untuk masing-masing soal
		let userAnswers = ["", ""]; // jawaban yang diisi pengguna untuk masing-masing soal
		let points = 0; // jumlah poin yang diperoleh pengguna
		
		// fungsi untuk menghitung poin
		function calculatePoints() {
			for (let i = 0; i < correctAnswers.length; i++) {
				if (userAnswers[i] === correctAnswers[i]) {
					points++;
				}
			}
		}
		
		// fungsi untuk menampilkan hasil
		function showResults() {
			calculatePoints();
			alert("Jawaban Anda:\n\nSoal 1: " + userAnswers[0] + "\nSoal 2: " + userAnswers[1] +
			      "\n\nJawaban Benar:\n\nSoal 1: " + correctAnswers[0] + "\nSoal 2: " + correctAnswers[1] +
			      "\n\nAnda mendapatkan " + points + " poin dari " + correctAnswers.length);
		}
		
		// event listener untuk tombol submit
		document.querySelector("input[type='submit']").addEventListener("click", function(event) {
			event.preventDefault(); // mencegah form dikirim ke server
			userAnswers[0] = document.querySelector("input[name='q1']:checked").value; // simpan jawaban pengguna untuk soal 1
			userAnswers[1] = document.querySelector("input[name='q2']:checked").value; // simpan jawaban pengguna untuk soal 2
			showResults(); // tampilkan hasil
		});
	</script>
</head>
<body>
	<h1>Soal Multiple Choice</h1>
	<form>
		<fieldset>
			<legend><span class="box">1</span> Apa itu HTML?</legend>
			<input type="radio" name="q1" value="a">A. Hyper Text Markup Language<br>
			<input type="radio" name="q1" value="b">B. Hyper Text Model Language<br>
			<input type="radio" name="q1" value="c">C. Hyper Text Management Language<br>
			<input type="radio" name="q1" value="d">D. Hyper Text Markup Linguistic<br>
		</fieldset>
		<fieldset>
			<legend><span class="box">2</span> Apa itu CSS?</legend>
			<input type="radio" name="q2" value="a">A. Cascading Style Sheets<br>
			<input type="radio" name="q2" value="b">B. Cascading Style System<br>
			<input type="radio" name="q2" value="c">C. Cascading Style Syntax<br>
			<input type="radio" name="q2" value="d">D. Cascading Style Selection<br>
        </fieldset>
        <fieldset>
			<legend><span class="box">3</span> Apa itu JavaScript?</legend>
			<input type="radio" name="q3" value="a">A. Bahasa pemrograman untuk membuat website dinamis<br>
			<input type="radio" name="q3" value="b">B. Bahasa pemrograman untuk membuat website statis<br>
			<input type="radio" name="q3" value="c">C. Bahasa pemrograman untuk membuat database<br>
			<input type="radio" name="q3" value="d">D. Bahasa pemrograman untuk membuat desain grafis<br>
		</fieldset>
		<fieldset>
			<legend><span class="box">4</span> Apa kepanjangan dari CSS?</legend>
			<input type="radio" name="q4" value="a">A. Cascading Style Sheets<br>
			<input type="radio" name="q4" value="b">B. Cascading Style System<br>
			<input type="radio" name="q4" value="c">C. Cascading Style Syntax<br>
			<input type="radio" name="q4" value="d">D. Cascading Style Selection<br>
		</fieldset>
		<input type="submit" value="Submit">
	</form>
	<script>
		// tambahkan jawaban benar dan poin untuk soal 3 dan 4 ke dalam variable
		correctAnswers.push("a", "a");
		const pointPerQuestion = 1;
		
		// tambahkan event listener untuk form, sehingga ketika pengguna mengisi jawaban maka poin akan dihitung
		document.querySelector("form").addEventListener("change", function(event) {
			const target = event.target;
			if (target.name === "q3") {
				userAnswers[2] = target.value;
			} else if (target.name === "q4") {
				userAnswers[3] = target.value;
			}
		});
		
		// ubah fungsi calculatePoints agar menghitung poin untuk semua soal
		function calculatePoints() {
			for (let i = 0; i < correctAnswers.length; i++) {
				if (userAnswers[i] === correctAnswers[i]) {
					points += pointPerQuestion;
				}
			}
		}
		
		// ubah fungsi showResults agar menampilkan jawaban dan poin untuk semua soal
		function showResults() {
			calculatePoints();
			let resultMessage = "Jawaban Anda:\n\n";
			let correctMessage = "Jawaban Benar:\n\n";
			for (let i = 0; i < correctAnswers.length; i++) {
				resultMessage += "Soal " + (i+1) + ": " + userAnswers[i] + "\n";
				correctMessage += "Soal " + (i+1) + ": " + correctAnswers[i] + "\n";
			}
			alert(resultMessage + "\n" + correctMessage + "\nAnda mendapatkan " + points + " poin dari " + (correctAnswers.length * pointPerQuestion));
		}
	</script>
</body>
</html>
<script>
// tambahkan event listener untuk form, sehingga ketika pengguna mengisi jawaban maka poin akan dihitung
document.querySelector("form").addEventListener("change", function(event) {
    const target = event.target;
    if (target.name === "q3") {
        userAnswers[2] = target.value;
    } else if (target.name === "q4") {
        userAnswers[3] = target.value;
    }
});

// ubah fungsi calculatePoints agar menghitung poin untuk semua soal
function calculatePoints() {
    for (let i = 0; i < correctAnswers.length; i++) {
        if (userAnswers[i] === correctAnswers[i]) {
            points += pointPerQuestion;
        }
    }
}

// ubah fungsi showResults agar menampilkan jawaban dan poin untuk semua soal
function showResults() {
    calculatePoints();
    let resultMessage = "Jawaban Anda:\n\n";
    let correctMessage = "Jawaban Benar:\n\n";
    for (let i = 0; i < correctAnswers.length; i++) {
        resultMessage += "Soal " + (i+1) + ": " + userAnswers[i] + "\n";
        correctMessage += "Soal " + (i+1) + ": " + correctAnswers[i] + "\n";
    }
    alert(resultMessage + "\n" + correctMessage + "\nAnda mendapatkan " + points + " poin dari " + (correctAnswers.length * pointPerQuestion));
}
</script>
</body>
</html>