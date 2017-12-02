<form method="post" action="<?php echo currentURL(); ?>" class="side-form">
	<?php
		// check for validation errors
		if(!empty($_SESSION['mk-validation-errors'])) {
			$html .= '<div class="alert-box error">';
			$html .= implode('<br />', $_SESSION['mk-validation-errors']);
			$html .= '</div>';
			// unset validation errors
			unset($_SESSION['mk-validation-errors']);
		}
	?>
	
	<?php if(!empty($_SESSION['mk-success'])): ?>
		<p>Thank you  for your submission.</p>
		<p> Please feel free to call us directly at <strong>(321) 727-0344</strong> if you have further questions.</p>
		<p>We look forward to hearing from you soon.</p>
		<p>Sincerely,</p>
		<p><strong>Alpha Translation Svcs, Inc.</strong><br />
		2210 S Front St. Ste. 304<br />
		Melbourne, FL 32901, USA</p>
	<?php else: ?>
		<div class="input-wrap">
			<label for="client-name">Full Name *</label>
			<input type="text" name="client-name" id="client-name" class="input-text" value="" />
		</div>
		<div class="input-wrap">
			<label for="client-phone">Phone Number *</label>
			<input type="text" name="client-phone" id="client-phone" class="input-text" value="" />
		</div>
		<div class="input-wrap">
			<label for="client-email">Email Address *</label>
			<input type="text" name="client-email" id="client-email" class="input-text" value="" />
		</div>
		<div class="input-wrap">
			<label for="client-project">Select Project *</label>
			<select name="client-project" id="client-project">
				<option>Translation</option>
				<option>Interpretation</option>
				<option>Transcription</option>
				<option>Proofreading</option>
				<option>Other</option>
			</select>
		</div>
		<div class="input-wrap">
			<label for="client-deadline">Date you need to complete project? *</label>
			<input type="text" name="client-deadline" id="client-deadline" class="input-text" autocomplete="off" value="" />
		</div>
		<div class="input-wrap">
			<label for="client-language-from">Select the language of your document *</label>
			<select name="client-language-from" id="client-language-from">
				<option selected="selected" value="English ">English </option>
				<option value="Albanian ">Albanian </option>
				<option value="Arabic ">Arabic </option>
				<option value="Argentine Spanish">Argentine Spanish</option>
				<option value="Armenian">Armenian</option>
				<option value="Bengali ">Bengali </option>
				<option value="Bolivian Spanish ">Bolivian Spanish </option>
				<option value="Brazilian Portuguese ">Brazilian Portuguese </option>
				<option value="British English ">British English </option>
				<option value="Bulgarian ">Bulgarian </option>
				<option value="Burmese ">Burmese </option>
				<option value="Cantonese ">Cantonese </option>
				<option value="Castilian ">Castilian </option>
				<option value="Catalan">Catalan</option>
				<option value="Chilean Spanish ">Chilean Spanish </option>
				<option value="Chinese ">Chinese </option>
				<option value="Colombian Spanish ">Colombian Spanish </option>
				<option value="Costa Rican Spanish">Costa Rican Spanish</option>
				<option value="Creole ">Creole </option>
				<option value="Croatian ">Croatian </option>
				<option value="Cuban Spanish">Cuban Spanish</option>
				<option value="Czech ">Czech </option>
				<option value="Danish ">Danish </option>
				<option value="Dominican Spanish ">Dominican Spanish </option>
				<option value="Dutch ">Dutch </option>
				<option value="Ecuadorian Spanish">Ecuadorian Spanish</option>
				<option value="European Portuguese">European Portuguese</option>
				<option value="European Spanish ">European Spanish </option>
				<option value="Farsi ">Farsi </option>
				<option value="Finnish ">Finnish </option>
				<option value="French ">French </option>
				<option value="French Creole">French Creole</option>
				<option value="German ">German </option>
				<option value="Greek ">Greek </option>
				<option value="Guatemalan Spanish">Guatemalan Spanish</option>
				<option value="Haitian Creole ">Haitian Creole </option>
				<option value="Hebrew ">Hebrew </option>
				<option value="Hindi ">Hindi </option>
				<option value="Hmong ">Hmong </option>
				<option value="Honduran Spanish ">Honduran Spanish </option>
				<option value="Hungarian ">Hungarian </option>
				<option value="Icelandic">Icelandic</option>
				<option value="Indonesian">Indonesian</option>
				<option value="Italian ">Italian </option>
				<option value="Japanese">Japanese</option>
				<option value="Korean">Korean</option>
				<option value="Kreyòl ">Kreyòl </option>
				<option value="Kurdish ">Kurdish </option>
				<option value="Latin ">Latin </option>
				<option value="Latin American Spanish">Latin American Spanish</option>
				<option value="Maltese ">Maltese </option>
				<option value="Mandarin Chinese">Mandarin Chinese</option>
				<option value="Mongolian ">Mongolian </option>
				<option value="Nicaraguan Spanish ">Nicaraguan Spanish </option>
				<option value="Norwegian">Norwegian</option>
				<option value="Panamanian Spanish ">Panamanian Spanish </option>
				<option value="Paraguayan Spanish ">Paraguayan Spanish </option>
				<option value="Persian">Persian</option>
				<option value="Peruvian Spanish ">Peruvian Spanish </option>
				<option value="Polish ">Polish </option>
				<option value="Portuguese ">Portuguese </option>
				<option value="Puerto Rican Spanish">Puerto Rican Spanish</option>
				<option value="Punjabi">Punjabi</option>
				<option value="Salvadorean Spanish ">Salvadorean Spanish </option>
				<option value="Serbian ">Serbian </option>
				<option value="Simplified Chinese">Simplified Chinese</option>
				<option value="Slovak ">Slovak </option>
				<option value="Slovenian ">Slovenian </option>
				<option value="Spanish">Spanish</option>
				<option value="Swahili ">Swahili </option>
				<option value="Swedish ">Swedish </option>
				<option value="Tagalog ">Tagalog </option>
				<option value="Taiwanese ">Taiwanese </option>
				<option value="Tamil ">Tamil </option>
				<option value="Thai ">Thai </option>
				<option value="Traditional Chinese ">Traditional Chinese </option>
				<option value="Turkish ">Turkish </option>
				<option value="Ukrainian">Ukrainian</option>
				<option value="Urdu ">Urdu </option>
				<option value="Uruguayan Spanish">Uruguayan Spanish</option>
				<option value="Venezuelan Spanish">Venezuelan Spanish</option>
				<option value="Vietnamese">Vietnamese</option>
				<option value="Yiddish ">Yiddish </option>
			</select>
		</div>
		<div class="input-wrap">
			<label for="client-language-to">Translation To *</label>
			<select name="client-language-to" id="client-language-to">
				<option selected="selected" value="English ">English </option>

                                <option value="English ">English </option>
				<option value="Albanian ">Albanian </option>
				<option value="Arabic ">Arabic </option>
				<option value="Argentine Spanish">Argentine Spanish</option>
				<option value="Armenian">Armenian</option>
				<option value="Bengali ">Bengali </option>
				<option value="Bolivian Spanish ">Bolivian Spanish </option>
				<option value="Brazilian Portuguese ">Brazilian Portuguese </option>
				<option value="British English ">British English </option>
				<option value="Bulgarian ">Bulgarian </option>
				<option value="Burmese ">Burmese </option>
				<option value="Cantonese ">Cantonese </option>
				<option value="Castilian ">Castilian </option>
				<option value="Catalan">Catalan</option>
				<option value="Chilean Spanish ">Chilean Spanish </option>
				<option value="Chinese ">Chinese </option>
				<option value="Colombian Spanish ">Colombian Spanish </option>
				<option value="Costa Rican Spanish">Costa Rican Spanish</option>
				<option value="Creole ">Creole </option>
				<option value="Croatian ">Croatian </option>
				<option value="Cuban Spanish">Cuban Spanish</option>
				<option value="Czech ">Czech </option>
				<option value="Danish ">Danish </option>
				<option value="Dominican Spanish ">Dominican Spanish </option>
				<option value="Dutch ">Dutch </option>
				<option value="Ecuadorian Spanish">Ecuadorian Spanish</option>
				<option value="European Portuguese">European Portuguese</option>
				<option value="European Spanish ">European Spanish </option>
				<option value="Farsi ">Farsi </option>
				<option value="Finnish ">Finnish </option>
				<option value="French ">French </option>
				<option value="French Creole">French Creole</option>
				<option value="German ">German </option>
				<option value="Greek ">Greek </option>
				<option value="Guatemalan Spanish">Guatemalan Spanish</option>
				<option value="Haitian Creole ">Haitian Creole </option>
				<option value="Hebrew ">Hebrew </option>
				<option value="Hindi ">Hindi </option>
				<option value="Hmong ">Hmong </option>
				<option value="Honduran Spanish ">Honduran Spanish </option>
				<option value="Hungarian ">Hungarian </option>
				<option value="Icelandic">Icelandic</option>
				<option value="Indonesian">Indonesian</option>
				<option value="Italian ">Italian </option>
				<option value="Japanese">Japanese</option>
				<option value="Korean">Korean</option>
				<option value="Kreyòl ">Kreyòl </option>
				<option value="Kurdish ">Kurdish </option>
				<option value="Latin ">Latin </option>
				<option value="Latin American Spanish">Latin American Spanish</option>
				<option value="Maltese ">Maltese </option>
				<option value="Mandarin Chinese">Mandarin Chinese</option>
				<option value="Mongolian ">Mongolian </option>
				<option value="Nicaraguan Spanish ">Nicaraguan Spanish </option>
				<option value="Norwegian">Norwegian</option>
				<option value="Panamanian Spanish ">Panamanian Spanish </option>
				<option value="Paraguayan Spanish ">Paraguayan Spanish </option>
				<option value="Persian">Persian</option>
				<option value="Peruvian Spanish ">Peruvian Spanish </option>
				<option value="Polish ">Polish </option>
				<option value="Portuguese ">Portuguese </option>
				<option value="Puerto Rican Spanish">Puerto Rican Spanish</option>
				<option value="Punjabi">Punjabi</option>
				<option value="Salvadorean Spanish ">Salvadorean Spanish </option>
				<option value="Serbian ">Serbian </option>
				<option value="Simplified Chinese">Simplified Chinese</option>
				<option value="Slovak ">Slovak </option>
				<option value="Slovenian ">Slovenian </option>
				<option value="Spanish" >Spanish</option>
				<option value="Swahili ">Swahili </option>
				<option value="Swedish ">Swedish </option>
				<option value="Tagalog ">Tagalog </option>
				<option value="Taiwanese ">Taiwanese </option>
				<option value="Tamil ">Tamil </option>
				<option value="Thai">Thai</option>
				<option value="Traditional Chinese ">Traditional Chinese </option>
				<option value="Turkish ">Turkish </option>
				<option value="Ukrainian">Ukrainian</option>
				<option value="Urdu ">Urdu </option>
				<option value="Uruguayan Spanish">Uruguayan Spanish</option>
				<option value="Venezuelan Spanish">Venezuelan Spanish</option>
				<option value="Vietnamese">Vietnamese</option>
				<option value="Yiddish ">Yiddish </option>
			</select>
		</div>
		<div class="input-wrap url">
			<label for="url">URL</label>
			<input type="text" name="url" id="url" class="input-text" value="" />
		</div>
		<div class="input-wrap submit">
			<button type="submit" class="input2 right">Submit</button>
		</div>	
	<?php endif; ?>
</form>