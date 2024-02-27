import pandas as pd
from difflib import SequenceMatcher
import sys

# get input arg
input_message = sys.argv[1]
#input_message = "siapa dekan di fakultas?";

#print("apa ini? "+input_message);

# Membaca data CSV ke dalam dataframe
df = pd.read_csv('chatbot_data.csv')

# Definisikan fungsi untuk menghitung probabilitas kesamaan antara input_message dan question
def calculate_similarity(question):
    return SequenceMatcher(None, input_message.lower(), question.lower()).ratio()

# Terapkan fungsi calculate_similarity pada kolom "question" menggunakan fungsi apply
df['similarity_probability'] = df['question'].apply(calculate_similarity)

# Menampilkan dataframe hasil
#print(df) 

# get max probability
max_similarity_row = df[df['similarity_probability'] == df['similarity_probability'].max()]
#print(max_similarity_row)

# to json array
json_array = max_similarity_row.to_json(orient='records')
print(json_array)

