@extends('layouts.web')

@section('title', 'Home | Clear Men Guinness World Records')

@section('content')

    <!-- Include Bootstrap 5 CSS and DataTables CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">

    <div class="container py-4">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="display-6 fw-bold">Official Attempts list</h1>
                <p class="text-muted mb-4">Search participants and view their recorded attempts.</p>
            </div>
        </div>
    </div>

    <div class="p-5">
        <table id="datatable-json" class="table table-striped table-bordered table-hover w-100">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Full Name</th>
                    <th>Number</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>John Doe</td>
                    <td>+1 123-456-7890</td>
                    <td>
                        <button class="btn btn-primary btn-sm view-attempts" data-name="John Doe"
                            data-image="assets/images/playerinfo/h1.jpg"
                            data-drive="https://drive.google.com/file/d/1zV7shmNpL54DzJR4yQr_lMCSZWwxXKWw/preview">View
                            Attempts</button>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Jane Smith</td>
                    <td>+1 987-654-3210</td>
                    <td>
                        <button class="btn btn-primary btn-sm view-attempts" data-name="Jane Smith"
                            data-image="assets/images/slide/slide2.png"
                            data-drive="https://drive.google.com/file/d/2bB2bB2bB2bB2bB2bB2bB2bB2bB2bB2b/preview">View
                            Attempts</button>
                    </td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Michael Johnson</td>
                    <td>+1 201-555-0123</td>
                    <td>
                        <button class="btn btn-primary btn-sm view-attempts" data-name="Michael Johnson"
                            data-image="assets/images/slide/slide3.jpg"
                            data-drive="https://drive.google.com/file/d/3cC3cC3cC3cC3cC3cC3cC3cC3cC3cC3c/preview">View
                            Attempts</button>
                    </td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>Emily Davis</td>
                    <td>+1 202-555-0456</td>
                    <td>
                        <button class="btn btn-primary btn-sm view-attempts" data-name="Emily Davis"
                            data-image="assets/images/slide/slide4.png"
                            data-drive="https://drive.google.com/file/d/4dD4dD4dD4dD4dD4dD4dD4dD4dD4dD4d/preview">View
                            Attempts</button>
                    </td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>Christopher Brown</td>
                    <td>+1 203-555-0678</td>
                    <td>
                        <button class="btn btn-primary btn-sm view-attempts" data-name="Christopher Brown"
                            data-image="assets/images/slide/slide1.jpg"
                            data-drive="https://drive.google.com/file/d/5eE5eE5eE5eE5eE5eE5eE5eE5eE5eE5e/preview">View
                            Attempts</button>
                    </td>
                </tr>
                <tr>
                    <td>6</td>
                    <td>Ashley Wilson</td>
                    <td>+1 204-555-0890</td>
                    <td>
                        <button class="btn btn-primary btn-sm view-attempts" data-name="Ashley Wilson"
                            data-image="assets/images/slide/slide2.png"
                            data-drive="https://drive.google.com/file/d/6fF6fF6fF6fF6fF6fF6fF6fF6fF6fF6f/preview">View
                            Attempts</button>
                    </td>
                </tr>
                <tr>
                    <td>7</td>
                    <td>Daniel Martinez</td>
                    <td>+1 205-555-1011</td>
                    <td>
                        <button class="btn btn-primary btn-sm view-attempts" data-name="Daniel Martinez"
                            data-image="assets/images/slide/slide3.jpg"
                            data-drive="https://drive.google.com/file/d/7gG7gG7gG7gG7gG7gG7gG7gG7gG7gG7g/preview">View
                            Attempts</button>
                    </td>
                </tr>
                <tr>
                    <td>8</td>
                    <td>Olivia Garcia</td>
                    <td>+1 206-555-1213</td>
                    <td>
                        <button class="btn btn-primary btn-sm view-attempts" data-name="Olivia Garcia"
                            data-image="assets/images/slide/slide4.png"
                            data-drive="https://drive.google.com/file/d/8hH8hH8hH8hH8hH8hH8hH8hH8hH8hH8h/preview">View
                            Attempts</button>
                    </td>
                </tr>
                <tr>
                    <td>9</td>
                    <td>Matthew Rodriguez</td>
                    <td>+1 207-555-1415</td>
                    <td>
                        <button class="btn btn-primary btn-sm view-attempts" data-name="Matthew Rodriguez"
                            data-image="assets/images/slide/slide1.jpg"
                            data-drive="https://drive.google.com/file/d/9iI9iI9iI9iI9iI9iI9iI9iI9iI9iI9i/preview">View
                            Attempts</button>
                    </td>
                </tr>
                <tr>
                    <td>10</td>
                    <td>Sophia Hernandez</td>
                    <td>+1 208-555-1617</td>
                    <td>
                        <button class="btn btn-primary btn-sm view-attempts" data-name="Sophia Hernandez"
                            data-image="assets/images/slide/slide2.png"
                            data-drive="https://drive.google.com/file/d/10jJ10jJ10jJ10jJ10jJ10jJ10jJ10jJ/preview">View
                            Attempts</button>
                    </td>
                </tr>
                <tr>
                    <td>11</td>
                    <td>Anthony Clark</td>
                    <td>+1 209-555-1819</td>
                    <td>
                        <button class="btn btn-primary btn-sm view-attempts" data-name="Anthony Clark"
                            data-image="assets/images/slide/slide3.jpg"
                            data-drive="https://drive.google.com/file/d/11kK11kK11kK11kK11kK11kK11kK11kK/preview">View
                            Attempts</button>
                    </td>
                </tr>
                <tr>
                    <td>12</td>
                    <td>Isabella Lewis</td>
                    <td>+1 210-555-2021</td>
                    <td>
                        <button class="btn btn-primary btn-sm view-attempts" data-name="Isabella Lewis"
                            data-image="assets/images/slide/slide4.png"
                            data-drive="https://drive.google.com/file/d/12lL12lL12lL12lL12lL12lL12lL12lL/preview">View
                            Attempts</button>
                    </td>
                </tr>
                <tr>
                    <td>13</td>
                    <td>Joshua Walker</td>
                    <td>+1 211-555-2223</td>
                    <td>
                        <button class="btn btn-primary btn-sm view-attempts" data-name="Joshua Walker"
                            data-image="assets/images/slide/slide1.jpg"
                            data-drive="https://drive.google.com/file/d/13mM13mM13mM13mM13mM13mM13mM13mM/preview">View
                            Attempts</button>
                    </td>
                </tr>
                <tr>
                    <td>14</td>
                    <td>Mia Hall</td>
                    <td>+1 212-555-2425</td>
                    <td>
                        <button class="btn btn-primary btn-sm view-attempts" data-name="Mia Hall"
                            data-image="assets/images/slide/slide2.png"
                            data-drive="https://drive.google.com/file/d/14nN14nN14nN14nN14nN14nN14nN14nN/preview">View
                            Attempts</button>
                    </td>
                </tr>
                <tr>
                    <td>15</td>
                    <td>Andrew Allen</td>
                    <td>+1 213-555-2627</td>
                    <td>
                        <button class="btn btn-primary btn-sm view-attempts" data-name="Andrew Allen"
                            data-image="assets/images/slide/slide3.jpg"
                            data-drive="https://drive.google.com/file/d/15oO15oO15oO15oO15oO15oO15oO15oO/preview">View
                            Attempts</button>
                    </td>
                </tr>
                <tr>
                    <td>16</td>
                    <td>Charlotte Young</td>
                    <td>+1 214-555-2829</td>
                    <td>
                        <button class="btn btn-primary btn-sm view-attempts" data-name="Charlotte Young"
                            data-image="assets/images/slide/slide4.png"
                            data-drive="https://drive.google.com/file/d/16pP16pP16pP16pP16pP16pP16pP16pP/preview">View
                            Attempts</button>
                    </td>
                </tr>
                <tr>
                    <td>17</td>
                    <td>Ryan King</td>
                    <td>+1 215-555-3031</td>
                    <td>
                        <button class="btn btn-primary btn-sm view-attempts" data-name="Ryan King"
                            data-image="assets/images/slide/slide1.jpg"
                            data-drive="https://drive.google.com/file/d/17qQ17qQ17qQ17qQ17qQ17qQ17qQ17qQ/preview">View
                            Attempts</button>
                    </td>
                </tr>
                <tr>
                    <td>18</td>
                    <td>Amelia Wright</td>
                    <td>+1 216-555-3233</td>
                    <td>
                        <button class="btn btn-primary btn-sm view-attempts" data-name="Amelia Wright"
                            data-image="assets/images/slide/slide2.png"
                            data-drive="https://drive.google.com/file/d/18rR18rR18rR18rR18rR18rR18rR18rR/preview">View
                            Attempts</button>
                    </td>
                </tr>
                <tr>
                    <td>19</td>
                    <td>Brandon Scott</td>
                    <td>+1 217-555-3435</td>
                    <td>
                        <button class="btn btn-primary btn-sm view-attempts" data-name="Brandon Scott"
                            data-image="assets/images/slide/slide3.jpg"
                            data-drive="https://drive.google.com/file/d/19sS19sS19sS19sS19sS19sS19sS19sS/preview">View
                            Attempts</button>
                    </td>
                </tr>
                <tr>
                    <td>20</td>
                    <td>Grace Green</td>
                    <td>+1 218-555-3637</td>
                    <td>
                        <button class="btn btn-primary btn-sm view-attempts" data-name="Grace Green"
                            data-image="assets/images/slide/slide4.png"
                            data-drive="https://drive.google.com/file/d/20tT20tT20tT20tT20tT20tT20tT20tT/preview">View
                            Attempts</button>
                    </td>
                </tr>
                <tr>
                    <td>21</td>
                    <td>Benjamin Adams</td>
                    <td>+1 219-555-3839</td>
                    <td>
                        <button class="btn btn-primary btn-sm view-attempts" data-name="Benjamin Adams"
                            data-image="assets/images/slide/slide1.jpg"
                            data-drive="https://drive.google.com/file/d/21uU21uU21uU21uU21uU21uU21uU21uU/preview">View
                            Attempts</button>
                    </td>
                </tr>
                <tr>
                    <td>22</td>
                    <td>Victoria Nelson</td>
                    <td>+1 220-555-4041</td>
                    <td>
                        <button class="btn btn-primary btn-sm view-attempts" data-name="Victoria Nelson"
                            data-image="assets/images/slide/slide2.png"
                            data-drive="https://drive.google.com/file/d/22vV22vV22vV22vV22vV22vV22vV22vV/preview">View
                            Attempts</button>
                    </td>
                </tr>
                <tr>
                    <td>23</td>
                    <td>Samuel Carter</td>
                    <td>+1 221-555-4243</td>
                    <td>
                        <button class="btn btn-primary btn-sm view-attempts" data-name="Samuel Carter"
                            data-image="assets/images/slide/slide3.jpg"
                            data-drive="https://drive.google.com/file/d/23wW23wW23wW23wW23wW23wW23wW23wW/preview">View
                            Attempts</button>
                    </td>
                </tr>
                <tr>
                    <td>24</td>
                    <td>Madison Mitchell</td>
                    <td>+1 222-555-4445</td>
                    <td>
                        <button class="btn btn-primary btn-sm view-attempts" data-name="Madison Mitchell"
                            data-image="assets/images/slide/slide4.png"
                            data-drive="https://drive.google.com/file/d/24xX24xX24xX24xX24xX24xX24xX24xX/preview">View
                            Attempts</button>
                    </td>
                </tr>
                <tr>
                    <td>25</td>
                    <td>Kevin Perez</td>
                    <td>+1 223-555-4647</td>
                    <td>
                        <button class="btn btn-primary btn-sm view-attempts" data-name="Kevin Perez"
                            data-image="assets/images/slide/slide1.jpg"
                            data-drive="https://drive.google.com/file/d/25yY25yY25yY25yY25yY25yY25yY25yY/preview">View
                            Attempts</button>
                    </td>
                </tr>
                <tr>
                    <td>26</td>
                    <td>Hannah Roberts</td>
                    <td>+1 224-555-4849</td>
                    <td>
                        <button class="btn btn-primary btn-sm view-attempts" data-name="Hannah Roberts"
                            data-image="assets/images/slide/slide2.png"
                            data-drive="https://drive.google.com/file/d/26zZ26zZ26zZ26zZ26zZ26zZ26zZ26zZ/preview">View
                            Attempts</button>
                    </td>
                </tr>
                <tr>
                    <td>27</td>
                    <td>Justin Turner</td>
                    <td>+1 225-555-5051</td>
                    <td>
                        <button class="btn btn-primary btn-sm view-attempts" data-name="Justin Turner"
                            data-image="assets/images/slide/slide3.jpg"
                            data-drive="https://drive.google.com/file/d/27aA27aA27aA27aA27aA27aA27aA27aA/preview">View
                            Attempts</button>
                    </td>
                </tr>
                <tr>
                    <td>28</td>
                    <td>Ella Parker</td>
                    <td>+1 226-555-5253</td>
                    <td>
                        <button class="btn btn-primary btn-sm view-attempts" data-name="Ella Parker"
                            data-image="assets/images/slide/slide4.png"
                            data-drive="https://drive.google.com/file/d/28bB28bB28bB28bB28bB28bB28bB28bB/preview">View
                            Attempts</button>
                    </td>
                </tr>
                <tr>
                    <td>29</td>
                    <td>Owen Evans</td>
                    <td>+1 227-555-5455</td>
                    <td>
                        <button class="btn btn-primary btn-sm view-attempts" data-name="Owen Evans"
                            data-image="assets/images/slide/slide1.jpg"
                            data-drive="https://drive.google.com/file/d/29cC29cC29cC29cC29cC29cC29cC29cC/preview">View
                            Attempts</button>
                    </td>
                </tr>
                <tr>
                    <td>30</td>
                    <td>Lily Collins</td>
                    <td>+1 228-555-5657</td>
                    <td>
                        <button class="btn btn-primary btn-sm view-attempts" data-name="Lily Collins"
                            data-image="assets/images/slide/slide2.png"
                            data-drive="https://drive.google.com/file/d/30dD30dD30dD30dD30dD30dD30dD30dD/preview">View
                            Attempts</button>
                    </td>
                </tr>
                <tr>
                    <td>31</td>
                    <td>Logan Ramirez</td>
                    <td>+1 229-555-5859</td>
                    <td>
                        <button class="btn btn-primary btn-sm view-attempts" data-name="Logan Ramirez"
                            data-image="assets/images/slide/slide3.jpg"
                            data-drive="https://drive.google.com/file/d/31eE31eE31eE31eE31eE31eE31eE31eE/preview">View
                            Attempts</button>
                    </td>
                </tr>
                <tr>
                    <td>32</td>
                    <td>Zoey Stewart</td>
                    <td>+1 230-555-6061</td>
                    <td>
                        <button class="btn btn-primary btn-sm view-attempts" data-name="Zoey Stewart"
                            data-image="assets/images/slide/slide4.png"
                            data-drive="https://drive.google.com/file/d/32fF32fF32fF32fF32fF32fF32fF32fF/preview">View
                            Attempts</button>
                    </td>
                </tr>
                <tr>
                    <td>33</td>
                    <td>Eric Morris</td>
                    <td>+1 231-555-6263</td>
                    <td>
                        <button class="btn btn-primary btn-sm view-attempts" data-name="Eric Morris"
                            data-image="assets/images/slide/slide1.jpg"
                            data-drive="https://drive.google.com/file/d/33gG33gG33gG33gG33gG33gG33gG33gG/preview">View
                            Attempts</button>
                    </td>
                </tr>
                <tr>
                    <td>34</td>
                    <td>Scarlett Rogers</td>
                    <td>+1 232-555-6465</td>
                    <td>
                        <button class="btn btn-primary btn-sm view-attempts" data-name="Scarlett Rogers"
                            data-image="assets/images/slide/slide2.png"
                            data-drive="https://drive.google.com/file/d/34hH34hH34hH34hH34hH34hH34hH34hH/preview">View
                            Attempts</button>
                    </td>
                </tr>
                <tr>
                    <td>35</td>
                    <td>Nathan Reed</td>
                    <td>+1 233-555-6667</td>
                    <td>
                        <button class="btn btn-primary btn-sm view-attempts" data-name="Nathan Reed"
                            data-image="assets/images/slide/slide3.jpg"
                            data-drive="https://drive.google.com/file/d/35iI35iI35iI35iI35iI35iI35iI35iI/preview">View
                            Attempts</button>
                    </td>
                </tr>
                <tr>
                    <td>36</td>
                    <td>Avery Cook</td>
                    <td>+1 234-555-6869</td>
                    <td>
                        <button class="btn btn-primary btn-sm view-attempts" data-name="Avery Cook"
                            data-image="assets/images/slide/slide4.png"
                            data-drive="https://drive.google.com/file/d/36jJ36jJ36jJ36jJ36jJ36jJ36jJ36jJ/preview">View
                            Attempts</button>
                    </td>
                </tr>
                <tr>
                    <td>37</td>
                    <td>Zachary Bell</td>
                    <td>+1 235-555-7071</td>
                    <td>
                        <button class="btn btn-primary btn-sm view-attempts" data-name="Zachary Bell"
                            data-image="assets/images/slide/slide1.jpg"
                            data-drive="https://drive.google.com/file/d/37kK37kK37kK37kK37kK37kK37kK37kK/preview">View
                            Attempts</button>
                    </td>
                </tr>
                <tr>
                    <td>38</td>
                    <td>Harper Foster</td>
                    <td>+1 236-555-7273</td>
                    <td>
                        <button class="btn btn-primary btn-sm view-attempts" data-name="Harper Foster"
                            data-image="assets/images/slide/slide2.png"
                            data-drive="https://drive.google.com/file/d/38lL38lL38lL38lL38lL38lL38lL38lL/preview">View
                            Attempts</button>
                    </td>
                </tr>
                <tr>
                    <td>39</td>
                    <td>Liam Simmons</td>
                    <td>+1 237-555-7475</td>
                    <td>
                        <button class="btn btn-primary btn-sm view-attempts" data-name="Liam Simmons"
                            data-image="assets/images/slide/slide3.jpg"
                            data-drive="https://drive.google.com/file/d/39mM39mM39mM39mM39mM39mM39mM39mM/preview">View
                            Attempts</button>
                    </td>
                </tr>
                <tr>
                    <td>40</td>
                    <td>Aria Reed</td>
                    <td>+1 238-555-7677</td>
                    <td>
                        <button class="btn btn-primary btn-sm view-attempts" data-name="Aria Reed"
                            data-image="assets/images/slide/slide4.png"
                            data-drive="https://drive.google.com/file/d/40nN40nN40nN40nN40nN40nN40nN40nN/preview">View
                            Attempts</button>
                    </td>
                </tr>
                <tr>
                    <td>41</td>
                    <td>Omar Diaz</td>
                    <td>+1 239-555-7879</td>
                    <td>
                        <button class="btn btn-primary btn-sm view-attempts" data-name="Omar Diaz"
                            data-image="assets/images/slide/slide1.jpg"
                            data-drive="https://drive.google.com/file/d/41oO41oO41oO41oO41oO41oO41oO41oO/preview">View
                            Attempts</button>
                    </td>
                </tr>
                <tr>
                    <td>42</td>
                    <td>Peyton Howard</td>
                    <td>+1 240-555-8081</td>
                    <td>
                        <button class="btn btn-primary btn-sm view-attempts" data-name="Peyton Howard"
                            data-image="assets/images/slide/slide2.png"
                            data-drive="https://drive.google.com/file/d/42pP42pP42pP42pP42pP42pP42pP42pP/preview">View
                            Attempts</button>
                    </td>
                </tr>
                <tr>
                    <td>43</td>
                    <td>Cole Bennett</td>
                    <td>+1 241-555-8283</td>
                    <td>
                        <button class="btn btn-primary btn-sm view-attempts" data-name="Cole Bennett"
                            data-image="assets/images/slide/slide3.jpg"
                            data-drive="https://drive.google.com/file/d/43qQ43qQ43qQ43qQ43qQ43qQ43qQ43qQ/preview">View
                            Attempts</button>
                    </td>
                </tr>
                <tr>
                    <td>44</td>
                    <td>Layla Murphy</td>
                    <td>+1 242-555-8485</td>
                    <td>
                        <button class="btn btn-primary btn-sm view-attempts" data-name="Layla Murphy"
                            data-image="assets/images/slide/slide4.png"
                            data-drive="https://drive.google.com/file/d/44rR44rR44rR44rR44rR44rR44rR44rR/preview">View
                            Attempts</button>
                    </td>
                </tr>
                <tr>
                    <td>45</td>
                    <td>Dylan Brooks</td>
                    <td>+1 243-555-8687</td>
                    <td>
                        <button class="btn btn-primary btn-sm view-attempts" data-name="Dylan Brooks"
                            data-image="assets/images/slide/slide1.jpg"
                            data-drive="https://drive.google.com/file/d/45sS45sS45sS45sS45sS45sS45sS45sS/preview">View
                            Attempts</button>
                    </td>
                </tr>
                <tr>
                    <td>46</td>
                    <td>Penelope Reed</td>
                    <td>+1 244-555-8889</td>
                    <td>
                        <button class="btn btn-primary btn-sm view-attempts" data-name="Penelope Reed"
                            data-image="assets/images/slide/slide2.png"
                            data-drive="https://drive.google.com/file/d/46tT46tT46tT46tT46tT46tT46tT46tT/preview">View
                            Attempts</button>
                    </td>
                </tr>
                <tr>
                    <td>47</td>
                    <td>Caleb Sanders</td>
                    <td>+1 245-555-9091</td>
                    <td>
                        <button class="btn btn-primary btn-sm view-attempts" data-name="Caleb Sanders"
                            data-image="assets/images/slide/slide3.jpg"
                            data-drive="https://drive.google.com/file/d/47uU47uU47uU47uU47uU47uU47uU47uU/preview">View
                            Attempts</button>
                    </td>
                </tr>
                <tr>
                    <td>48</td>
                    <td>Nora Price</td>
                    <td>+1 246-555-9293</td>
                    <td>
                        <button class="btn btn-primary btn-sm view-attempts" data-name="Nora Price"
                            data-image="assets/images/slide/slide4.png"
                            data-drive="https://drive.google.com/file/d/48vV48vV48vV48vV48vV48vV48vV48vV/preview">View
                            Attempts</button>
                    </td>
                </tr>
                <tr>
                    <td>49</td>
                    <td>Marcus Hayes</td>
                    <td>+1 247-555-9495</td>
                    <td>
                        <button class="btn btn-primary btn-sm view-attempts" data-name="Marcus Hayes"
                            data-image="assets/images/slide/slide1.jpg"
                            data-drive="https://drive.google.com/file/d/49wW49wW49wW49wW49wW49wW49wW49wW/preview">View
                            Attempts</button>
                    </td>
                </tr>
                <tr>
                    <td>50</td>
                    <td>Sadie Bennett</td>
                    <td>+1 248-555-9697</td>
                    <td>
                        <button class="btn btn-primary btn-sm view-attempts" data-name="Sadie Bennett"
                            data-image="assets/images/slide/slide2.png"
                            data-drive="https://drive.google.com/file/d/50xX50xX50xX50xX50xX50xX50xX50xX/preview">View
                            Attempts</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    </td>
    </tr>
    </td>
    </tr>
    </td>

    <!-- Modal -->
    <div class="modal fade" id="attemptsModal" tabindex="-1" aria-labelledby="attemptsModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="attemptsModalLabel">Attempts</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <!-- Left column: Image -->
                        <div class="col-md-6 mb-3">
                            <img id="attemptsImage" src="" class="img-fluid rounded" style="width: 100%; height: auto;">
                        </div>

                        <!-- Right column: Drive iframe -->
                        <div class="col-md-6 mb-3" style="position: relative; padding-top: 56.25%;">
                            <iframe id="attemptsDriveIframe" src=""
                                style="position: absolute; top:0; left: 0; width: 100%; height: 100%; border: 0;"
                                allow="autoplay" allowfullscreen>
                            </iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function () {
            // Initialize DataTable with full features
            var table = $('#datatable-json').DataTable({
                responsive: true,
                paging: true,          // Enable pagination
                pageLength: 25,         // Default entries per page
                lengthMenu: [5, 10, 25, 50], // Entries dropdown
                searching: true,       // Enable search
                ordering: true,        // Enable column ordering
                info: true,            // Show "Showing x to y of z entries"
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Search attempts..."
                }
            });

            // Handle View Attempts button click
            $('.view-attempts').click(function () {
                var modalEl = document.getElementById('attemptsModal');
                var modal = new bootstrap.Modal(modalEl);

                var name = $(this).data('name');
                var image = $(this).data('image');
                var drive = $(this).data('drive');

                $('#attemptsModalLabel').text(name + ' - Attempt');
                $('#attemptsImage').attr('src', image)
                    .css({
                        'width': '100%',    // Make image responsive
                        'height': '80%'    // Maintain aspect ratio
                    });

                // Set the Google Drive iframe source and size
                $('#attemptsDriveIframe')
                    .attr('src', drive)
                    .css({
                        'width': '550px',   // Custom width
                        'height': '80%'   // Custom height
                    });

                modal.show();
            });

            // Clear modal content on close
            $('#attemptsModal').on('hidden.bs.modal', function () {
                $('#attemptsImage').attr('src', '');
                $('#attemptsDriveIframe').attr('src', '');
                $('#attemptsDriveIframe').css({ 'width': '', 'height': '' }); // reset size
            });
        });
    </script>



@endsection