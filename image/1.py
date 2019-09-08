from cv2 import cv2
import os
import numpy as np

subjects = ["", "PRUTHVI", "Deepak","Sahil"] # change the name according to you as per your pictures in folders s1,s2,s3 etc respectively
def detect_face(img):
    gray = cv2.cvtColor(img, cv2.COLOR_BGR2GRAY)
    face_cascade = cv2.CascadeClassifier('C:/Users/Spark Endeavors/Downloads/opencv/sources/data/lbpcascades/lbpcascade_frontalface_improved.xml')
    faces = face_cascade.detectMultiScale(gray, scaleFactor=1.1, minNeighbors=5)
    grays=[]
    face_code=[]
    if (len(faces) == 0):
         return None,None
    else:
        for face in faces:
            (x,y,w,h)=face
            grays.append(gray[y:y+w, x:x+h])
            face_code.append(face)
        return grays,face_code

def prepare_training_data(data_folder_path):
    dirs = os.listdir(data_folder_path)
    faces = []
    labels = []
    for dir_name in dirs:
        if not dir_name.startswith("s"):
            continue;
        label = int(dir_name.replace("s", ""))
        subject_dir_path = data_folder_path + "/" + dir_name
        subject_images_names = os.listdir(subject_dir_path)
        for image_name in subject_images_names:
            if image_name.startswith("."):
                continue;
            image_path = subject_dir_path + "/" + image_name
            image = cv2.imread(image_path)
            cv2.imshow("Training on image...", image)
            cv2.waitKey(100)
            face, rect = detect_face(image)
            if face is not None:
                for fa in face:
                    faces.append(fa)
                    labels.append(label)
        cv2.destroyAllWindows()
        cv2.waitKey(1)
        cv2.destroyAllWindows()

    return faces, labels

print("Preparing data...")
faces, labels = prepare_training_data("C:/Users/Spark Endeavors/Desktop/image/training-data")
print("Data prepared")
print("Total faces: ", len(faces))
print("Total labels: ", len(labels))

face_recognizer = cv2.face.LBPHFaceRecognizer_create()
face_recognizer.train(faces, np.array(labels))


def draw_rectangle(img, rect):
    (x, y, w, h) = rect
    cv2.rectangle(img, (x, y), (x + w, y + h), (0, 255, 0), 2)


def draw_text(img, text, x, y):
    cv2.putText(img, text, (x, y), cv2.FONT_HERSHEY_PLAIN, 1.5, (0, 255, 0), 2)

def predict(test_img):
    img = test_img.copy()
    face, rect = detect_face(img)
    if face is None:
        return test_img
    else:
         for fa,re in zip(face,rect):
            label= face_recognizer.predict(fa)
            label_text = subjects[label[0]]
            draw_rectangle(img, re)
            draw_text(img, label_text, re[0], re[1]-5)

    return img

print("Predicting images...")
cap=cv2.VideoCapture(0)
while( cap.isOpened() ):
    # Capture frame-by-frame
    ret, frame = cap.read()
    if frame is not None:
        predicted_img1 = predict(frame)
        print("Prediction complete")
        cv2.imshow(subjects[1], predicted_img1)
        if cv2.waitKey(1) & 0xFF == ord('q'):   #press q to quit the window
                 break
cap.release()
cv2.destroyAllWindows()